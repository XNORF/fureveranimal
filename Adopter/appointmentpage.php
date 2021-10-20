<?php
  if(isset($_POST['availabilitybtn'])){
    checkAvailability($_POST);
  }

  function checkAvailability(){
    $date = $_POST['appointmentDate'];
    $timestamp = strtotime($date);
    $day = date('D', $timestamp);
    if($day == "Mon" || $day == "Wed"){
      header("Location: appointmentpage.php?error=invalid-day");
      exit();
    }else{
      
    }

  }

  if(isset($_GET['error'])){
    $errorCheck = $_GET['error'];
  }
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
      <link href="assets/css/boxdesign.css" rel="stylesheet">
    <link href="assets/css/ft-form-styles-v3.css" rel="stylesheet">
    

    <!-- =======================================================
    * Template Name: Ninestars - v4.3.0
    * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script>
            $(document).ready(function() {
                var minDate = new Date();
                $("#appDate").datepicker({
                    //showAnim: 'drop',
                    numberOfMonth: 1,
                    minDate: minDate,
                    maxDate: '+1M',
                    dateFormat: 'yy-mm-dd',
                });
            });
        </script>
  </head>

  <body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
          <h1 class="text-light"><a href="index.php"><span><img src="assets/img/logofur.png" ></span></a></h1>
    
      
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
                <li><a href="donation/donation.php">Donate</a></li>
          <li><a href="volunteer.php">Volunteer</a></li>
              </ul>
            </li>
          <li><a class="nav-link scrollto" href="accountadmin.php">Account</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="login/login.php">Log Out</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

    <!-- ======= Payment Section ======= -->
    <section id="payment" >
    <div class="row" >
      <div class="col-75">
        <div class="container" >
          <form action="appointmentpage.php" method="post" autocomplete="off">        
        
        <div class="container" >
              <div class="col-50">
                <br><br><h3 class="text-center"><b>Appointment Information</b></h3><br> 
          <div id="container" class="center" >
          
        <div id="label" ><b>Operating Hours</b></div>
      <br><br><p class="center" >  Monday: Closed for adoptions and viewing</p>

    <p class="center"> Tuesday: 12:00 p.m. – 8:00 p.m</p>

    <p class="center">Wednesday: Closed for adoptions and viewing</p>

    <p class="center"> Thursday: 12:00 noon – 8:00 p.m.</p>

    <p class="center"> Friday: 12:00 noon – 5:00 p.m.</p>

    <p class="center"> Saturday & Sunday: 12:00 noon – 3:00 p.m.</p>

    </div><br>
    <p class="text-center" style="color:red"><b>NOTE: We only accept 2 adopters per day</b></p>

    
    <br><div class="text-center">
              
                <label for="fname"><i class="fa fa-user"></i> Appointment Date:&nbsp;</label>
                <input type="text" id="appDate" name="appointmentDate" placeholder="" style="width:170px;height:50px;" required><br><br>
                <label for="email"><i class="fa fa-envelope"></i>Appointment Time:&nbsp;</label>
                <input type="time" id="appTime" name="appointmentTime" placeholder="" style="width:170px;height:50px;" min="12:00" max="19:45" required><br><br>
                <?php
                if(isset($errorCheck)){
                  if($errorCheck == "invalid-day"){
                    echo "<label for='fname'><i class='fa fa-user'>Mondays and Wednesdays are unavailable</i></label><br>";
                  }else{

                  }
                }                   
                  
                ?>
                <input type="submit" value="Check availability" class="btn-get-started scrollto" name="availabilitybtn">
                <input type="submit" value="Proceed to payment" class="btn-get-started scrollto" name="paymentbtn"><br><br>
                <hr>
              
        </div>    
      </div>
      </div>
    </div>
    </form>
  </body>
</html>