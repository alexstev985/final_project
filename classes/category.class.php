<?php

class Category extends DbConnection {
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
                echo "<option class='category-location' value='".$row['category_id']."'>
                ".$row['category_name']."
                </option>";
            }
        }
    }

    public function openCategoryPage ($search) {
        $all_categories = "SELECT * FROM categories WHERE category_id = '$search'";
        $all_categories_result = $this->conn->query($all_categories);
        if ($all_categories_result->num_rows > 0) {
            while ($row = $all_categories_result->fetch_assoc()) {
                header("location: category_page.php?id='". $row['category_id'] ."'&category_name='". $row['category_name'] ."'");
                //var_dump($row['category_id']);
            }
        }
    }

    public function displayCategoryData () {
        $category_id = $_GET['id'];
        //$category_name = $_GET['category_name'];
        //var_dump($category_id);
        $get_category_query = "SELECT * FROM categories WHERE category_id = $category_id";
        $get_category_result = $this->conn->query($get_category_query);
        if ($get_category_result->num_rows > 0) {
            $row = $get_category_result->fetch_assoc();
            //update name
            echo  "<div class='row'>";
            echo  "<div class='col-xs-12 col-sm-12 offset-md-4 col-md-4 offset-lg-4 col-lg-4 offset-xl-4 col-xl-4    offset-xxl-4 col-xxl-4 text-start d-block m-auto p-xs-2 p-sm-2 p-md-0 p-lg-3 p-xl-5 p-xxl-5 my-5'>";
            echo  "<form action='' method='post' enctype='multipart/form-data'>";
            echo  "<label for=''>Category name</label><br>";
            echo  "<input class='form-control mb-2 border-2' type='text' name='new_category_name' value='".$row['category_name']."' required><br>";
            echo  "<input class='btn btn-outline-primary mt-1' type='submit' value='Change name' name='update_category_name'><br>";
            echo  "</form>";
            echo  "</div>";
            echo  "</div>";
            //update image
            echo  "<div class='row'>";
            echo  "<div class='col-xs-12 col-sm-12 offset-md-4 col-md-4 offset-lg-4 col-lg-4 offset-xl-4 col-xl-4    offset-xxl-4 col-xxl-4 text-start d-block m-auto p-xs-2 p-sm-2 p-md-0 p-lg-3 p-xl-5 p-xxl-5 mb-5'>";
            echo  "<form action='' method='post' enctype='multipart/form-data'>";
            echo  "<label for=''>Category image</label><br>";
            echo  "<input class='form-control border-2' type='file' name='new_category_image' value='".$row['category_image']."' required><br>";
            echo  "<input class='btn btn-outline-primary mt-1' type='submit' value='Change image' name='update_category_image'>";
            echo  "</form>";
            echo  "</div>";
            echo  "</div>";
        }
    }

    public function updateCategoryName ($new_category_name) {

    }

    public function updateCategoryImage ($destination) {
        $category_id = $_GET['id'];
        $images = scandir('uploads');
        $new_pic_name = $_FILES['new_category_image']['name'];
        $new_pic_temp = $_FILES['new_category_image']['tmp_name'];
        $new_pic_type = $_FILES['new_category_image']['type'];
        $new_pic_size = $_FILES['new_category_image']['size'];
        $max_pic_size = 1000 * 1000;
        $new_img_ext = pathinfo($_FILES['new_category_image']['name']);
        $allowed_file_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        
        $get_category_query = "SELECT * FROM categories WHERE category_id = $category_id";
        $get_category_result = $this->conn->query($get_category_query);

         if (in_array($pic_name, $images)) {
             $pic_name = $img_ext['filename'] . '_' . date('Y-m-d His') . '.' . $img_ext['extension'];
         }

         if (!in_array($new_pic_type, $allowed_file_types)) {
             die('Wrong file type');
         }

         if ($new_pic_size > $max_pic_size) {
             die('File to large');
         }

         $destination = 'uploads/' . $new_pic_name;

         $update_category_query = "UPDATE categories SET category_name = ?, category_image = ? WHERE category_id = ?";
         $update_category_prep = $this->conn->prepare($update_category_query);
         $update_category_prep->bind_param('sss', $new_category_name, $destination, $category_id);
         $update_category_result =$update_category_prep->execute();
         if ($update_category_result) {
             if ($new_pic_name != '') {
                 move_uploaded_file($new_pic_temp, $destination);
                 echo "<script type=text/javascript>alert('Category updated')</script>";
             }
         } else {
             echo "<script type=text/javascript>alert('Error while trying to update category')</script>";
         }
    }
}

?>