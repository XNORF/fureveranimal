<?php
include_once '../include/db.php';

if (isset($_GET['error'])) {
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
  <link href="assets/css/payment.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: Ninestars - v4.3.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php
  if (isset($errorCheck)) {
    if ($errorCheck == "insufficient") {
      echo "<script>
				Swal.fire({
					icon: 'warning',
					title: 'Insufficient Balance',
					text: 'Your card does not have sufficient funds!',
				  })
				</script>";
    } else if ($errorCheck == "declined") {
      echo "<script>
				Swal.fire({
					icon: 'warning',
					title: 'Declined',
					text: 'Your card has been declined, please contact your bank for more information.',
				  })
				</script>";
    }
  }
  ?>

  <div class="container">
    <div class="title">
      <h2>Adoption Payment Form</h2>
    </div>
    <div class="d-flex">
      <form action="./charge.php" method="post" id="payment-form">
        <br><br>

        <?php
        if (isset($_GET['pet']) && isset($_GET['id']) && isset($_GET['date']) && isset($_GET['time'])) {
          $pet = $_GET['pet'];
          $id = $_GET['id'];
          $date = $_GET['date'];
          $time = $_GET['time'];

          $sql = "select * from pets WHERE name = '$pet' AND id = '$id'";
          $qry = mysqli_query($GLOBALS['con'], $sql);
          $count = mysqli_num_rows($qry);
          if ($count == 1) {
            $userRecord = mysqli_fetch_assoc($qry);
            $age = $userRecord['age'];
            $type = $userRecord['type'];
            $image = $userRecord['image'];
          }
        }
        ?>


        <input type="hidden" name="petname" value="<?php echo $pet ?>" required>
        <input type="hidden" name="petid" value="<?php echo $id ?>" required>
        <input type="hidden" name="date" value="<?php echo $date ?>" required>
        <input type="hidden" name="time" value="<?php echo $time ?>" required>
        <input type="hidden" name="price" value="120" required>

        <div class="row">
          <center>
            <div class=" class col-md-11">
              <!-- Used to display form errors -->
              <div id="card-errors" role="alert"></div>
              <div id="card-element" class="form-control">
                <!-- a Stripe Element will be inserted here. -->
              </div>
            </div>
          </center>
        </div>
        <br>
        <div class="row">
          <span class="class col-md-3">Name on card</span>
          <input type="text" class="col-md-9" name="cardname" required>
        </div>

        <div class="row">
          <span class="class col-md-3">Email Address</span>
          <input type="email" class="col-md-9" name="email" required>
        </div>

        <div class="row">
          <span class="class col-md-3">Phone</span>
          <input type="text" class="col-md-9" name="phone" required>
        </div>

        <div class="row">
          <span class="class col-md-3">Address 1</span>
          <input type="text" class="col-md-9" name="address1" placeholder="House number and street name" required>
        </div>

        <div class="row">
          <span class="class col-md-3">Address 2</span>
          <input type="text" class="col-md-9" name="address2" placeholder="Apartment, suite, unit etc. (optional)" required>
        </div>

        <div class="row">
          <span class="class col-md-3">Town / City</span>
          <input type="text" class="col-md-9" name="city" required>
        </div>

        <div class="row">
          <span class="class col-md-3">State / Country</span>
          <input type="text" class="col-md-9" name="state" required>
        </div>

        <div class="row">
          <span class="class col-md-3">Postcode / ZIP</span>
          <input type="text" class="col-md-9" name="postcode" required>
        </div>
        <br>
        <div class="row">
          <div class="class col-md-8"></div>
          <button name="orderBtn" class="btn col-md-3">Place Payment</button>
        </div>
      </form>

      <div class="Yorder">
        <form>
          <table>
            <tr>
              <th colspan="2">Your Payment</th>
            </tr>
            <tr>
              <td width="20%"> <img src="<?php echo '../Admin/admin%20dashboard/pages/samples/upload/' . $image ?>" width=" 90"> </td>
              <td>
                <div class="product-qty"> <span class="d-block">Name: <?php echo $pet ?></span><span class="d-block">Type: <?php echo $type ?></span><span class="d-block">Age: <?php echo $age ?></span></div>
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
        </form>
      </div><!-- Yorder -->
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="assets/js/charge.js"></script>

</body>

</html>