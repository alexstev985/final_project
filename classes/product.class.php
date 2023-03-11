<?php

class Product extends DbConnection {
    public function addCategory ($category_name, $destination) {
        $images = scandir('uploads');
        $pic_name = $_FILES['category_image']['name'];
        $pic_temp = $_FILES['category_image']['tmp_name'];
        $pic_type = $_FILES['category_image']['type'];
        $pic_size = $_FILES['category_image']['size'];
        $max_pic_size = 1000 * 1000;
        $img_ext = pathinfo($_FILES['category_image']['name']);
        $allowed_file_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];


        $category_query = "SELECT * FROM categories WHERE category_name = '$category_name'";
        $category_result = $this->conn->query($category_query);

        if ($category_result->num_rows > 0) {
            $row = $category_result->fetch_assoc();
            if ($row['category_name'] == $category_name) {
                die('Category already exists');
            }
        }

        if (in_array($pic_name, $images)) {
            $pic_name = $img_ext['filename'] . '_' . date('Y-m-d His') . '.' . $img_ext['extension'];
        }

        if (!in_array($pic_type, $allowed_file_types)) {
            die('Wrong file type');
        }

        if ($pic_size > $max_pic_size) {
            die('File to large');
        }

        $destination = 'uploads/' . $pic_name;

        $new_category_query= "INSERT INTO categories (category_name, category_image) VALUES (?, ?)";
        $new_category = $this->conn->prepare($new_category_query);
        $new_category->bind_param('ss', $category_name, $destination);
        $new_category_result = $new_category->execute();

        if ($new_category_result) {
            if ($pic_name != '') {
                move_uploaded_file($pic_temp, $destination);
                echo "<script type=text/javascript>alert('New category added')</script>";
            }
        } else {
            echo "<script type=text/javascript>alert('Error while trying to add new category')</script>";
        }
    }

    public function loadCategories () {
        $all_categories = "SELECT * FROM categories";
        $all_categories_result = $this->conn->query($all_categories);
        if ($all_categories_result->num_rows > 0) {
            while ($row = $all_categories_result->fetch_assoc()) {
                echo "<option value=".$row['category_id'].">".$row['category_name']."</option>";
            }
        }
    }
}

?>