<?php

class Customer extends DbConnection {
    public function register ($full_name, $email, $username, $password, $status) {
        $customers_query = "SELECT * FROM customers WHERE email = '$email' OR username = '$username' OR `password` = '$password'";
        $customers_result = $this->conn->query($customers_query);

        if ($customers_result->num_rows > 0) {
            $row = $customers_result->fetch_assoc();
            if ($row['email'] == $email) {
                die('Email already exists');
            }

            if ($row['username'] == $username) {
                die('User name already exists');
            }

            if (password_verify($password, $row['password'])) {
                die('Password already exists');
            }
        }

        $passwd = password_hash($password, PASSWORD_BCRYPT);
        $user_status = '';

        $new_customer = "INSERT INTO customers (full_name, email, username, `password`, `status`) VALUES (?, ?, ?, ?, ?)";
        $new_customer_prep = $this->conn->prepare($new_customer);
        $new_customer_prep->bind_param('sssss', $full_name, $email, $username, $passwd, $user_status);
        $new_customer_result = $new_customer_prep->execute($new_customer_prep);
        if ($new_customer_result) {
            header('Location: login.php');
        } else {
            die('Error while trying to register new customer');
        }
    }

    public function login ($login_data) {
        $login = "SELECT `password`, `status` FROM customers WHERE email = ?";

        $login_prep = $this->conn->prepare($login);
        $login_prep->bind_param('s', $login_data['email']);
        $login_prep->execute();
        $login_result = $login_prep->get_result();

        if ($login_result->num_rows > 0) {
            $row = $login_result->fetch_assoc();
            if (password_verify($login_data['password'], $row['password'])) {
                //var_dump($row['status']);
                if ($row['status'] == 'admin') {
                    Session::createSession($login_data['email']);
                    header('Location: admin_panel.php');
                } else {
                    Session::createSession ($login_data['email']);
                    header('Location: shop.php');
                }
            } else {
                echo "<script type=text/javascript>alert('Wrong password')</script>";
            }
        } else {
            echo "<script type=text/javascript>alert('User does not exists')</script>";
        }
    }
}

?>