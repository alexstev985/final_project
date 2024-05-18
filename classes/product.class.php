<?php

class Product extends DbConnection {
    public function addProduct($brand, $category_id, $model, $price, $image) {
        
        $images = scandir('uploads');
        $pic_name = $_FILES['product_image']['name'];
        $pic_temp = $_FILES['product_image']['tmp_name'];
        $pic_type = $_FILES['product_image']['type'];
        $pic_size = $_FILES['product_image']['size'];
        $max_pic_size = 1000 * 1000;
        $img_ext = pathinfo($_FILES['product_image']['name']);
        $allowed_file_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    }
}
?>