<?php
include_once '../include/db.php';
session_start();

if (isset($_GET['pet']) && isset($_GET['id'])) {
  $pet = $_GET['pet'];
  $id = $_GET['id'];
  if (!$GLOBALS['con']) {
    echo mysqli_error($GLOBALS['con']);
  } else {
    $sql = "select * from pets WHERE name = '$pet' AND id = '$id'";
    $qry = mysqli_query($GLOBALS['con'], $sql);
    $count = mysqli_num_rows($qry);
    if ($count == 1) {
      $userRecord = mysqli_fetch_assoc($qry);
      $name = $userRecord['name'];
      $age = $userRecord['age'];
      $gender = $userRecord['gender'];
      $health = $userRecord['health'];
      $story = $userRecord['story'];
      $image = $userRecord['image'];
    } else {
      header("Location: adopt.php");
    }
  }
} else {
  header("Location: adopt.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <?php echo "<title>$name | Fur-Ever Animal Shelter</title>"; ?>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logofurever.png" rel="icon">
  <link href="assets/img/logofurever.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v4.3.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span><img src="assets/img/logofur.png"></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php#about">About Us</a></li>
          <li class="dropdown"><a href="#"><span>What We Do</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="rehoming.php">Shelter, Rehabilitation & Rehoming</a></li>
              <li><a href="spay.php">Spay & Neuter</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>What You Can Do</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adopt.php">Adopt</a></li>
              <li><a href="donation/donation.php">Donate</a></li>

            </ul>
          </li>

          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="accountadopter.php">Account</a></li>
          <form action="adopterFunction.php" method="POST">
            <li><button class="getstarted scrollto" formmethod="POST" name="logout">Log Out</button></li>
          </form>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Pet Information</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="adopt.php">Adopt</a></li>
            <li>Pet Information</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper-container">
              <div class="swiper-wrapper align-items-center">
                <div>
                  <?php echo "<img src='../Admin/admin%20dashboard/pages/samples/upload/$image' width= 800 height = 800 alt=''>"; ?>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Pet Information</h3>
              <ul>
                <?php echo "<li><strong>Name</strong>: $name</li>
                <li><strong>Age</strong>: $age Old</li>
                <li><strong>Gender</strong>: $gender</li>
				        <li><strong>Health Condition(s)</strong>: $health</li>"; ?>

              </ul>
            </div>

            <div class="portfolio-description">

              <h2>Story of <?php echo $name; ?>'s life</h2>
              <?php echo "<p>
                $story
              </p>"; ?>

              <br>
              <br>
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-6">
                    <div class="portfolio">

                      <?php echo "<a href='appointmentpage.php?pet=$name&id=$id' class='btn-get-started scrollto'><b>ADOPT</b></a>"; ?>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      </div>

    </section><!-- End Portfolio Details Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">

          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Fur-Ever Animal Shelter</h3>
            <p>
              Jalan Sultan Yahya Petra,<br>
              Kampung Datuk Keramat,<br>
              54100 Kuala Lumpur, <br>
              Wilayah Persekutuan Kuala Lumpur <br><br>
              <strong>Phone:</strong> +03-4256 5312<br>
              <strong>Email:</strong> fureveranimal@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="rehoming.php">Shelter</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="rehoming.php">Rehabilitation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="rehoming.php">Rehoming</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="spay.php">Spay and Neuter</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Ninestars</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>