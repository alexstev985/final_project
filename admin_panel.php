<?php

include 'includes/autoloader.inc.php';
Session::sessionStart();
Session::userNotLogged();
$new_category = new Category();

?>

<?php

if (isset($_POST['add_category'])) {
  $category_name = $_POST['category_name'];
  $category_image = $_FILES['category_image'];
  $new_category->addCategory($category_name, $category_image);
}

if (isset($_POST['log_out'])) {
  Session:: logout();
}

if (isset($_POST['edit_category'])) {
  $searched_category = $_POST['select_category'];
  $new_category->openCategoryPage($searched_category);
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
                          <form action="" method="post">
                            <input class="bg-dark text-light border-0 me-3 py-2 ps-0" name="log_out" type="submit" value="Log out">
                          </form>
                        </li>
                    </ul>
                </div>
                <div class="col-4 text-center pt-2"><p>Welcome Administrator</p></div>
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
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="#"><i class="fa-solid fa-computer fa-2x"></i></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#categories">categories</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle show-on-hover" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="nav-link" onmouseenter="ariaTrue()" onmouseleave="ariaFalse()">
                  PRODUCTS
                </a>
                <ul class="dropdown-menu show-on-hover">
                  <li><a class="dropdown-item" href="#">laptops</a></li>
                  <li><a class="dropdown-item" href="#">desktops</a></li>
                  <li><a class="dropdown-item" href="#">phones</a></li>
                  <li><a class="dropdown-item" href="#">tablets</a></li>
                  <div class="btn-group dropend">
                    <button type="button" class="border border-0 bg-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      HARDWARE
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">power supplies</a></li>
                      <li><a class="dropdown-item" href="#">motherboards</a></li>
                      <li><a class="dropdown-item" href="#">ssd</a></li>
                      <li><a class="dropdown-item" href="#">hard drives</a></li>
                      <li><a class="dropdown-item" href="#">ram memory</a></li>
                      <li><a class="dropdown-item" href="#">cpu's</a></li>
                      <li><a class="dropdown-item" href="#">gpu's</a></li>
                    </ul>
                  </div>

                  <div class="btn-group dropend">
                    <button type="button" class="border border-0 bg-white px-3 py-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      ACCESSORIES
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">mice</a></li>
                      <li><a class="dropdown-item" href="#">keyboards</a></li>
                      <li><a class="dropdown-item" href="#">headphones</a></li>
                      <li><a class="dropdown-item" href="#">speakers</a></li>
                    </ul>
                  </div>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div>
        </div>
    </nav>
    <!--Content-->
    <div class="container">
      <h2 class="text-center">Add new category</h2>

      <div class="row" id="categories">
        <div class="col-xs-12 col-sm-12 offset-md-4 col-md-4 offset-lg-4 col-lg-4 offset-xl-4 col-xl-4    offset-xxl-4 col-xxl-4 text-start d-block m-auto p-xs-2 p-sm-2 p-md-0 p-lg-3 p-xl-5 p-xxl-5 my-5">
          <form action="" method="post" enctype="multipart/form-data">
            <label for="">Category name</label><br>
            <input class="form-control mb-2 border-2" type="text" name="category_name" required><br>
            <label for="">Category image</label><br>
            <input class="form-control border-2" type="file" name="category_image" required><br>
            <input class="btn btn-outline-primary mt-1" type="submit" value="Add new category" name="add_category">
          </form>
        </div>
      </div>

      <h2 class="text-center">Update or remove category</h2>

      <div class="row">
        <div class="col-xs-12 col-sm-12 offset-md-4 col-md-4 offset-lg-4 col-lg-4 offset-xl-4 col-xl-4    offset-xxl-4 col-xxl-4 text-start d-block m-auto p-xs-2 p-sm-2 p-md-0 p-lg-3 p-xl-5 p-xxl-5 my-5">
          <form action="" method="post" enctype="multipart/form-data">
            <select class="form-select mb-2 border-2" name="select_category" id="floatingSelect" aria-label="Floating label select example">
            <option selected value="">Select category</option>
            <?php
              $new_category->loadCategories();
            ?>
            </select>
            <input class="btn btn-outline-primary mt-1" type="submit" value="Edit category" name="edit_category" id="open-category-location">
          </form>
        </div>
      </div>

      <!--<div class="row">
        <div class="col-3 my-3">
          <div class="card">
            <img src="./images/dell_pc.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Desktops</h5>
              <div class="d-flex justify-content-between">
                <button class="btn btn-outline-primary">Update</button>
                <button class="btn btn-outline-danger">Remove</button>
              </div>
            </div>
          </div>
        </div>
      </div>-->
    </div>
    <!--Footer-->
    <div class="footer bg-dark text-start text-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <a href="" class="nav-link">Home</a>
            <a href="" class="nav-link">Products</a>
            <a href="" class="nav-link">About us</a>
            <a href="" class="nav-link">Contact</a>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <h5>Follow us</h5>
            <a href="" class="nav-link"><i class="fa-brands fa-twitter"></i> Tweeter</a>
            <a href="" class="nav-link"><i class="fa-brands fa-facebook"></i> Facebook</a>
            <a href="" class="nav-link"><i class="fa-brands fa-instagram"></i> Instagram</a>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <h5>Contacts</h5>
            <a href="" class="nav-link"><i class="fa-solid fa-location-dot"></i> 1 Awesome Street</a>
            <a href="" class="nav-link"><i class="fa-solid fa-phone"></i> +123 456 789</a>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <h5>Newsletter</h5>
            <form>
              <input class="form-control me-2" type="email" placeholder="Your email" aria-label="Email">
              <button class="btn btn-outline-primary mt-1" type="submit">Sign up</i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Copyright-->
    <div class="text-center text-light bg-dark">
      <p class="text-center m-0">&#169; All Rights Reserved. Design by Aleksandar Stevanovic :-)</p>
    </div>
    <button class="back-top" id="back-to-top"><i class="fa-solid fa-chevron-up fa-2x"></i></button>
    <!--include bootstrap 5 script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
    <script src="./js/admin_panel.js"></script>
</body>
</html>