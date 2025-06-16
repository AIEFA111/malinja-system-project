<?php
include 'include/dbconn.php';

if (!$dbconn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kusina - Free Bootstrap 4 Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.html">Malinja Cafe</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
        <li class="nav-item"><a href="order.html" class="nav-link">Order</a></li>
        <li class="nav-item"><a href="update.html" class="nav-link">Profile</a></li>
        <li class="nav-item"><a href="index.html" onclick="alert('You have successfully logged out.')" class="nav-link">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_4.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Specialties</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Specialties</span>
        <h2 class="mb-4">Our Menu</h2>
      </div>
    </div>

    <?php
    $product_category = ['Breakfast', 'Lunch', 'Dinner'];
    foreach ($product_category as $cat) {
      echo '<div class="col-md-12 menu-wrap">';
      echo '<div class="heading-menu text-center ftco-animate">';
      echo '<h3>' . $cat . '</h3>';
      echo '</div>';

      $query = "SELECT * FROM product WHERE category = '$cat'";
      $result = $dbconn->query($query);

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="menus d-flex ftco-animate">';
          echo '<div class="menu-img img" style="background-image: url(images/' . $row["picture"] . ');"></div>';
          echo '<div class="text">';
          echo '<div class="d-flex">';
          echo '<div class="one-half"><h3>' . $row["product_name"] . '</h3></div>';
          echo '<div class="one-forth"><span class="price">RM' . number_format($row["product_price"], 2) . '</span></div>';
          echo '</div>';
          echo '<p>' . $row["product_description"] . '</p>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<p class="text-center">No items found for ' . $cat . '.</p>';
      }
      echo '</div>'; // close menu-wrap
    }
    ?>
  </div>
</section>

<footer class="ftco-footer ftco-bg-dark ftco-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6 col-lg-3">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Malinja Cafe</h2>
          <p>Malinja Cafe is built with the goal of enriching campus life through a warm welcome of the various foods served.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Open Hours</h2>
          <ul class="list-unstyled open-hours">
            <li class="d-flex"><span>Monday</span><span>7:00 - 23:00</span></li>
            <li class="d-flex"><span>Tuesday</span><span>7:00 - 23:00</span></li>
            <li class="d-flex"><span>Wednesday</span><span>7:00 - 23:00</span></li>
            <li class="d-flex"><span>Thursday</span><span>7:00 - 23:00</span></li>
            <li class="d-flex"><span>Friday</span><span>7:00 - 23:00</span></li>
            <li class="d-flex"><span>Saturday</span><span>7:00 - 23:00</span></li>
            <li class="d-flex"><span>Sunday</span><span>7:00 - 23:00</span></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p>&copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Built with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
      </div>
    </div>
  </div>
</footer>

<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
  </svg>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
