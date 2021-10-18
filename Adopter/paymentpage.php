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
<section id="payment" class="d-flex align-items-center">
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
	  
	  
	  <div class="row">
          <div class="col-50">
		  
            <br><br><h3><b>Appointment Information</b></h3><br> 
			<div id="container">
			
    <div id="label" class="center" ><b>Operating Hours</b></div>
	<br><br><p class="center">  Monday: Closed for adoptions and viewing</p>

<p class="center"> Tuesday: 12:00 p.m. – 8:00 p.m</p>

<p class="center">Wednesday: Closed for adoptions and viewing</p>

<p class="center"> Thursday: 12:00 noon – 8:00 p.m.</p>

<p class="center"> Friday: 12:00 noon – 5:00 p.m.</p>

<p class="center"> Saturday & Sunday: 12:00 noon – 3:00 p.m.</p>
</div>
<br>
            <label for="fname"><i class="fa fa-user"></i> Appointment Date</label><br>
            <input type="date" id="appDate" name="appointmentDate" placeholder="" style="width:134px;height:50px;"><br><br>
            <label for="email"><i class="fa fa-envelope"></i>Appointment Time</label><br>
            <input type="time" id="appTime" name="appointmentTime" placeholder="" style="width:125px;height:50px;"><br><br>
			<input type="submit" value="Check availability" class="btn-get-started scrollto"><br><br><hr>

        <div class="row">
          <div class="col-50">
            <br><br><h3><b>Billing Address</b></h3><br>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="">
			<label for="phoneNo"><i class="fa fa-envelope"></i> Phone Number</label>
            <input type="text" id="PhoneNo" name="PhoneNumber" placeholder="">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="">
              </div>
              <div class="col-50">
                <label for="zip">Postcode</label>
                <input type="text" id="zip" name="zip" placeholder="">
              </div>
            </div>
          </div><br>
<hr><br><br>
          <div class="col-50">
            <br><h3><b>Payment</b></h3><br>
            
			<img src="assets/img/credit.jpg" width="200"><br><br>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label><br><br>
        <input type="submit" value="Continue to checkout" class="btn-get-started scrollto"><br><br>
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          
        </span>
      </h4>
     
	  <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
								 <p><a href="#">Full Adoption Fee</a> <span class="price"></span></p>
                                    <td width="20%"> <img src="assets/img/dog3.jpg" width="90"> </td>
                                    <td width="60%"> <span class="font-weight-bold">Ian</span>
                                        <div class="product-qty"> <span class="d-block">Type: Dog</span> <span>Age: 1 Year Old</span> </div><br>
										<div class="product-qty"> <span class="d-block"><span>Health Care Fee</span> </div>
										<div class="product-qty"> <span class="d-block">Tax Fee</span></div>
										<div class="product-qty"> <span class="d-block">Insurance Fee</span></div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right"> <span class="font-weight-bold">RM 100</span> </div><br><br><br>
										<div class="text-right"> <span class="font-weight-bold">RM 60</span> </div>
										<div class="text-right"> <span class="font-weight-bold">RM 10</span> </div>
										<div class="text-right"> <span class="font-weight-bold">RM 120</span> </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
     <br>
      <h5><p><b>Total</b> <span class="price" style="color:black"></span></p></h5>
	  
    </div>
  </div>
</div>