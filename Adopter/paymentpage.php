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
  <link href="assets/css/payment.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: Ninestars - v4.3.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <div class="container">
    <div class="title">
      <h2>Adoption Payment Form</h2>
    </div>
    <div class="d-flex">
      <form action="./charge.php" id="payment-form">
        <br><br>

        <label>
          <div id="card-element" class="form-control col-md-8">
            <!-- a Stripe Element will be inserted here. -->
          </div>
          <!-- Used to display form errors -->
          <div id="card-errors" role="alert"></div>
        </label>
        <label>
          <span>Name on card <span class="required">*</span></span>
          <input type="text" name="fname">
        </label>
        <label>
          <span>Email Address <span class="required">*</span></span>
          <input type="email" name="city">
        </label>
        <label>
          <span>Phone <span class="required">*</span></span>
          <input type="tel" name="city">
        </label>
        <label>
          <span>Address 1<span class="required">*</span></span>
          <input type="text" name="houseadd" placeholder="House number and street name" required>
        </label>
        <label>
          <span>Address 2<span class="required">*</span></span>
          <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
        </label>
        <label>
          <span>Town / City <span class="required">*</span></span>
          <input type="text" name="city">
        </label>
        <label>
          <span>State / County <span class="required">*</span></span>
          <input type="text" name="city">
        </label>
        <label>
          <span>Postcode / ZIP <span class="required">*</span></span>
          <input type="text" name="city">
        </label>
      </form>

      <div class="Yorder">
        <table>
          <tr>
            <th colspan="2">Your Order</th>
          </tr>
          <tr>
            <td width="20%"> <img src="assets/img/dog3.jpg" width="90"> </td>
            <td>
              <div class="product-qty"> <span class="d-block">Name: Ian</span><span class="d-block">Type: Dog</span><span class="d-block">Age: 1 y/o</span></div>
            </td>

          </tr>
          <tr>
            <td>Fees:
              <hr>
              Adoption<br>
              Food
              Supplies
            </td>
            <td><br><br>
              RM 30.00<br>
              RM 50.00<br>
              RM 40.00<br>
          </tr>
          <tr>
            <td><b>Subtotal</b></td>
            <td>RM 120.00</td>
          </tr>
        </table><br>
        <button type="button">Place Order</button>
      </div><!-- Yorder -->
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="assets/js/charge.js"></script>

</body>

</html>