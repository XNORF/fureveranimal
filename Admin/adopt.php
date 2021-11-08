<?php
include_once '../include/db.php';
$qry = "SELECT * FROM pets";
$query_run = mysqli_query($GLOBALS['con'], $qry);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fur-Ever Animal Shelter</title>
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
          <li><a class="nav-link scrollto" href="index.php">About Us</a></li>
          <li class="dropdown"><a href="#"><span>What We Do</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="rehoming.php">Shelter, Rehabilitation & Rehoming</a></li>
              <li><a href="spay.php">Spay & Neuter</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>What You Can Do</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adopt.php">Adopt</a></li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="index.php">Contact</a></li>
          <li><a class="nav-link scrollto" href="admin%20dashboard/pages/samples/accountadmin.php">Account</a></li>
          <form action="login/function.php" method="POST">
            <li><button class="getstarted scrollto" formmethod="POST" name="logout">Log Out</button></li>
          </form>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Adopt, don't shop!</h1>
          <h2 class="text-dark">There are many kittens, cats, puppies and dogs at our centre. If you are prepared to give one of these animals a home for the rest of its life, it would be one life saved. Come choose from our wonderful variety of animals!</h2>
          <div>
            <a href="index.php" class="btn-get-started scrollto"><b>HOME</b></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/animalshelter.png" class="" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Catalogue</h2>
          <p>Choose an animal to be your fur-ever buddy</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-cat">Cats</li>
              <li data-filter=".filter-dog">Dogs</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php
          if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) {
              $id = $row['id'];
              $name = $row['name'];
              $age = $row['age'];
              $image = $row['image'];
              $type = $row['type'];

              if ($type == "Cat") {
                echo
                "<div class='col-lg-4 col-md-6 portfolio-item filter-cat'>
                    <div class='portfolio-wrap'>
                      <img src='../Admin/admin%20dashboard/pages/samples/upload/$image' class='img-fluid' alt=''>
                      <div class='portfolio-links'>
                        <a href='../Admin/admin%20dashboard/pages/samples/upload/$image' data-gallery='portfolioGallery' class='portfolio-lightbox' title='$name'><i class='bi bi-plus'></i></a>
                      </div>
                      <div class='portfolio-info'>
                        <h4>$name</h4>
                        <p>$age old</p>
                      </div>
                    </div>
                  </div>";
              } else if ($type == "Dog") {
                echo
                "<div class='col-lg-4 col-md-6 portfolio-item filter-dog'>
                    <div class='portfolio-wrap'>
                      <img src='../Admin/admin%20dashboard/pages/samples/upload/$image' class='img-fluid' alt=''>
                      <div class='portfolio-links'>
                        <a href='../Admin/admin%20dashboard/pages/samples/upload/$image' data-gallery='portfolioGallery' class='portfolio-lightbox' title='$name'><i class='bi bi-plus'></i></a>
                      </div>
                      <div class='portfolio-info'>
                        <h4>$name</h4>
                        <p>$age old</p>
                      </div>
                    </div>
                  </div>";
              }
            }
          } else {
          }
          ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Report Animal Cruelty</h4>
            <p>To protect the animals from being abused, click this button.</p>
            <a href="https://akh.dvs.gov.my/support" class="btn-get-started scrollto"><b>REPORT</b></a>
            </form>
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