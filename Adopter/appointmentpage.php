<?php
  include_once '../include/db.php';
  session_start();
  if(isset($_GET['pet']) && isset($_GET['id'])){
    $pet = $_GET['pet'];
    $id = $_GET['id'];
    $_SESSION['pet'] = $pet;
    $_SESSION['id'] = $id;

    if(!$GLOBALS['con']){
      echo mysqli_error($GLOBALS['con']);
    }else{
        $sql = "select * from pets WHERE name = '$pet' AND id = '$id'";        
        $qry = mysqli_query($GLOBALS['con'],$sql);
        $count = mysqli_num_rows($qry);
        if($count == 1){
        }else{
          header("Location: adopt.php");
        }
    }
  }else{
    header("Location: adopt.php");
  }

  if(isset($_POST['availabilitybtn'])){
    checkAvailability($_POST);
  }else if(isset($_POST['paymentbtn'])){
    header("Location: paymentpage.php");
  }

  function checkAvailability(){
    $date = $_POST['appointmentDate'];
    $time = $_POST['appointmentTime'];
    $timestamp = strtotime($date);
    $day = date('D', $timestamp);
    $pet = $_SESSION['pet'];
    $id = $_SESSION['id'];
    if($day == "Mon" || $day == "Wed"){
      header("Location: appointmentpage.php?pet=$pet&id=$id&error=invalid-day");
      exit();
    }else{
      if(!$GLOBALS['con']){
        echo mysqli_error($GLOBALS['con']);
      }else{
          $sql = "select * from ";// Update here one day
          $qry = mysqli_query($GLOBALS['con'],$sql);
          $count = mysqli_num_rows($qry);
          if($count == 0){
          }else{
            header("Location: adopt.php");
          }
      }
      header("Location: appointmentpage.php?pet=$pet&id=$id&date=$date&time=$time&error=none");
      exit();
    }
    //add database stuffs
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
                <input type="text" 
                  <?php
                    if(isset($_GET['date'])){
                      echo "value=" . $_GET['date'];
                    }
                  ?>
                id="appDate" name="appointmentDate" placeholder="" style="width:170px;height:50px;" required><br><br>
                <label for="email"><i class="fa fa-envelope"></i>Appointment Time:&nbsp;</label>
                <input type="time"
                  <?php
                    if(isset($_GET['time'])){
                      echo "value=" . $_GET['time'];
                    }
                  ?>
                id="appTime" name="appointmentTime" placeholder="" style="width:170px;height:50px;" min="12:00" max="19:45" required><br><br>
                <?php
                if(isset($errorCheck)){
                  if($errorCheck == "invalid-day"){
                    echo "<label for='fname'><i class='fa fa-user'>Mondays and Wednesdays are unavailable</i></label><br>";
                  }else if($errorCheck == "none"){
                    echo "<label for='fname'><i class='fa fa-user'>Available</i></label><br>";
                  }
                }                   
                  
                ?>
                <input type="submit" value="Check availability" class="btn-get-started scrollto" name="availabilitybtn">
              
                <?php
                if(isset($errorCheck)){
                  if($errorCheck == "none"){
                    echo "<input type='submit' value='Proceed to payment' class='btn-get-started scrollto' name='paymentbtn'>";
                  }else{
                    echo "<input type='submit' value='Proceed to payment' class='btn-get-started scrollto' name='paymentbtn' disabled='disabled'>";
                  }
                }else{
                  echo "<input type='submit' value='Proceed to payment' class='btn-get-started scrollto' name='paymentbtn' disabled='disabled'>";
                }
                ?>
                <br><br><hr>
              </form>
        </div>    
      </div>
      </div>
    </div>
    
  </body>
</html>