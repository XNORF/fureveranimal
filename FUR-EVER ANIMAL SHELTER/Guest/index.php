<?php
session_start();
if (isset($_SESSION['adopter'])) {
  header("Location: Adopter/index.php");
} else if (isset($_SESSION['admin'])) {
  header("Location: Admin/index.php");
} {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Homepage | Fur-Ever Animal Shelter</title>
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
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li class="dropdown"><a href="#"><span>What We Do</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="rehoming.php">Shelter, Rehabilitation & Rehoming</a></li>
              <li><a href="spay.php">Spay & Neuter</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>What You Can Do</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="adopt.php">Adopt</a></li>
              <li><a href="login/loginmain.php">Donate</a></li>

            </ul>
          </li>

          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="login/loginmain.php">Login / Signup</a></li>
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
          <h1>Be kind to animals who share our world.</h1>
          <h2 class="text-dark">Saving one animal won't change the world, but it will change the world for that one animal.</h2>
          <div>
            <a href="adopt.php" class="btn-get-started scrollto"><b>ADOPT</b></a>
            <a href="login/loginmain.php" class="btn-get-started scrollto"><b>DONATE</b></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/kucing.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/catd2.png" class="img-fluid" alt="" data-aos="zoom-in">
          </div>

          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">Wanna know more about us?</h3>
            <p data-aos="fade-up" data-aos-delay="100"></p>

            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-book-heart"></i>
                <h4>Our Story</h4>
                <p>Fur-Ever Animal Shelter is a nonprofit organization that finds homes for abandoned cats and dogs throughout Kuala Lumpur and Selangor area and provides behavior intervention when needed to improve chances of adoption. Founded in 2021, we operate an animal shelter in Jalan Semarak, Kuala Lumpur.
                  <br>We also provide programs that enhance the bond between animals and people.
                </p>
              </div>

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-donate-heart"></i>
                <h4>Mission</h4>
                <p>As an animal adoption and rescue organization, we always have hundreds of dogs, cats, puppies and kittens available, and that special one is waiting for you. Adopt a pet, save a life and add to your loving family.

                  Search our available pets and begin one of the most rewarding journeys of your life.??? Don???t see what you are looking for? Give us a call or stop in, new pets in need arrive every day.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Check out the great services we offer</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-home-heart"></i></div>
              <h4 class="title"><a href="">Shelter</a></h4>
              <p class="description">We provide the safest shelter for our animals with consistent care and love before they're adopted</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bxs-first-aid"></i></div>
              <h4 class="title"><a href="">Rehabilitation</a></h4>
              <p class="description">We perform follow-ups and after-adoption care for the animals' condition and health</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-baidu"></i></div>
              <h4 class="title"><a href="">Rehoming</a></h4>
              <p class="description">We will strive to ???nd the best animal-and-human match for you and your new pet</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bxs-capsule"></i></div>
              <h4 class="title"><a href="">Spay and Neuter</a></h4>
              <p class="description">We make sure that our animals are neutered, vaccinated, dewormed,and kept as healthy as possible</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Check out our beautiful animals</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Cats</li>
              <li data-filter=".filter-card">Dogs</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cat5.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cat5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Lily"><i class="bi bi-plus"></i></a>
              </div>

              <div class="portfolio-info">
                <h4>Lily</h4>
                <p>5 months old</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/dog5.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/dog5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Marshmallow"><i class="bi bi-plus"></i></a>

              </div>
              <div class="portfolio-info">
                <h4>Marshmallow</h4>
                <p>2 years old</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cat7.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cat7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Nyx"><i class="bi bi-plus"></i></a>
              </div>

              <div class="portfolio-info">
                <h4>Nyx</h4>
                <p>1 year old</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/dog9.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/dog9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Peanut"><i class="bi bi-plus"></i></a>
              </div>

              <div class="portfolio-info">
                <h4>Peanut</h4>
                <p>9 months old</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cat10_.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cat10_.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Grey"><i class="bi bi-plus"></i></a>
              </div>

              <div class="portfolio-info">
                <h4>Grey</h4>
                <p>1.5 years old</p>
              </div>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/dog2.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/dog2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="King"><i class="bi bi-plus"></i></a>
              </div>

              <div class="portfolio-info">
                <h4>King</h4>
                <p>10 months old</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/blindcat2.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/blindcat2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Bailey"><i class="bi bi-plus"></i></a>
              </div>

              <div class="portfolio-info">
                <h4>Bailey</h4>
                <p>3 years old</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/blindog.jpeg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/blindog.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Cooper"><i class="bi bi-plus"></i></a>
              </div>

              <div class="portfolio-info">
                <h4>Cooper</h4>
                <p>2 years old</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cat3.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cat3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Luna"><i class="bi bi-plus"></i></a>
              </div>

              <div class="portfolio-info">
                <h4>Luna</h4>
                <p>1 year old</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">
          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Where are you located? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Fur-Ever Animal Shelter is located at Jalan Sultan Yahya Petra, Kampung Datuk Keramat, 54100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">What are your hours? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">

              <p><b>Monday</b>: Closed for adoptions and viewing</p>
              <p><b>Tuesday</b>: 12:00 p.m. ??? 8:00 p.m</p>
              <p><b>Wednesday</b>: Closed for adoptions and viewing</p>
              <p><b>Thursday</b>: 12:00 noon ??? 8:00 p.m.</p>
              <p><b>Friday</b>: 12:00 noon ??? 5:00 p.m.</p>
              <p><b>Saturday & Sunday</b>: 12:00 noon ??? 3:00 p.m.</p>

              <p>In order to process the application, we are not able to send pets home with adopter on the same day; after submitting an application to adopt, an adoption counselor will help you schedule an appointment to finalize your adoption on a future date.</p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">How long will the adoption process take? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                The entire adoption process varies but the goal is for the adoption to be completed within 2 to 3 days.
              </p>
              <p>
                Due to limited space and insurance reasons, only adopters accompanied by FAS personnel can be brought back to view the animals.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Why should I foster a cat or a dog? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                As a foster parent, you will be able to love, care for, and enjoy knowing different cats and dogs. And you will be doing a wonderful thing ??? giving these deserving animals a chance at a new life.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Will I get to choose the cat or dog to foster? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                We will tell you about the animals that are in need of foster homes and you can let us know your preference.
                If we feel that the animal is a good match for your home we will set you up as a foster home.
                We do our best to place an animal that fits your lifestyle. If you live in an apartment, you can ask for or an older animal who is low energy or a cat or dog in medical recovery who needs to be kept quiet. If you are an active family, you can ask for a dog who needs lots of walks and plenty of exercise. If someone in your family is comfortable working with dogs, they can help with some basic obedience or teach him some tricks.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Do you take credit cards for adoption fees? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
                Yes, we accept all major credit cards for adoption fees.
              </p>
            </div>
          </li>
        </ul>
      </div>

    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Our team is always here to help</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/team/jaehyun.jpeg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Jaehyun</h4>
                  <span>Chief Executive Officer</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/team/lisa.jpeg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Lisa</h4>
                  <span>Product Manager</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/team/jk.jpeg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Jungkook</h4>
                  <span>CTO</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="member">
              <img src="assets/img/team/jennie.jpeg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Jennie</h4>
                  <span>Accountant</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
          <p>They trusted us</p>
        </div>

        <div class="clients-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Contact us the get started</p>
        </div>

        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jalan Sultan Yahya Petra, Kampung Datuk Keramat, 54100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>fureveranimalshelter@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+03-4256 5312</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1991.8508361002696!2d101.71983412045972!3d3.1730237187055654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37e8de0a443f%3A0x9e772d5b7ac66d27!2sUTM%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1629974102744!5m2!1sen!2smy" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Us Section -->

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
              <strong>Email:</strong> fureveranimalshelter@gmail.com<br>
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