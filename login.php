<?php

include 'includes/autoloader.inc.php';
Session::SessionStart();
Session::userLogged();
$logged_customer = new Customer();

?>

<?php

if (isset($_POST['login'])) {
    $login_data = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];
    $logged_customer->login($login_data);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--include font awesome 6-->
    <!--example for larger icons : <i class="fa-solid fa-user fa-2x"></i>-->
    <script src="https://kit.fontawesome.com/cfa133828c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!--include bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--include google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/index.css">
    <title>Document</title>
</head>
<body>
    <!--Header-->
    <div class="header bg-dark text-light">
        <div class="container pt-1">
            <div class="row">
                <div class="col-4">
                    <ul class="nav">
                        <li class="nav-item">
                          <a class="nav-link text-light ps-0" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-light ps-0" href="register.php">Register</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4 text-center pt-2"><p>Login to our online shop!</p></div>
                <div class="col-4 text-end pt-2">
                    <select>
                        <option selected value="1">USD</option>
                        <option value="2">EUR</option>
                        <option value="3">RSD</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!--Login form-->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 offset-md-4 col-md-4 offset-lg-4 col-lg-4 offset-xl-4 col-xl-4 offset-xxl-4 col-xxl-4 text-start d-block m-auto p-xs-2 p-sm-2 p-md-0 p-lg-3 p-xl-5 p-xxl-5 my-5">
                <form action="" method="post">
                    <label for="">Email</label><br>
                    <input class="form-control mb-2 border-2" type="email" name="email" required><br>
                    <label for="">Password</label><br>
                    <input class="form-control border-2" type="password" name="password" id="pass-input" required><br>
                    <label for="">Show password</label><br>
                    <input class="form-check-input mt-0 border-2" type="checkbox" name="" id="show-password"><br>
                    <input class="btn btn-outline-primary mt-1" type="submit" value="Log in" name="login">
                </form>

                <div>
                    <a href=""><h5 class="mt-3">Log in with Google <i class="fa-brands fa-google fa-2x"></i></h5></a>
                    <a href=""><h5 class="mt-3">Log in with Facebook <i class="fa-brands fa-facebook fa-2x"></i></h5></a>
                </div>
            </div>
        </div>
    </div>
    <!--Copyright-->
    <div class="text-center text-light bg-dark">
      <p class="text-center m-0">&#169; All Rights Reserved. Design by Aleksandar Stevanovic :-)</p>
    </div>
    <!--include bootstrap 5 script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="./js/reg_login.js"></script>
</body>
</html>