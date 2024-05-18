<?php

include 'includes/autoloader.inc.php';
Session::sessionStart();
Session::userNotLogged();
$edit_category = new Category();

?>

<?php

if (isset($_POST['log_out'])) {
  Session:: logout();
}

if (isset($_POST['admin_panel'])) {
  header('Location: admin_panel.php');
}

if (isset($_POST['update_category_name'])) {
  $new_category_name = $_POST['new_category_name'];
  $edit_category->updateCategoryName($new_category_name);
}

if (isset($_POST['update_category_image'])) {
  $new_destination = $_FILES['new_category_image'];
  $edit_category->updateCategoryImage($new_destination);
}

if (isset($_POST['delete_category'])) {
  $edit_category->deleteCategory($category_id);
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
                        <li class="nav-item">
                          <form action="" method="post">
                            <input class="bg-dark text-light border-0 me-3 py-2 ps-0" name="admin_panel" type="submit" value="Back">
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
    <!--Content-->
    <div class="container">
      <h2 class="text-center mt-3">Update or remove category</h2>

      <?php $edit_category->displayCategoryData(); ?>
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