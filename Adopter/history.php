<?php
include_once '../include/db.php';
session_start();
$email = $_SESSION['adopter'];
if (!$GLOBALS['con']) {
  echo mysqli_error($GLOBALS['con']);
} else {
  $sql = "select * from adopter WHERE email = '$email'";
  $qry = mysqli_query($GLOBALS['con'], $sql);
  $userRecord = mysqli_fetch_assoc($qry);
  $username = $userRecord['username'];
  $image = $userRecord['image'];
}
?>

<!DOCTYPE html>
<html lang="en">

<!--utk back end link benda ni kat: https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=crud-data-table-for-database-with-modal-form-->

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
  <link rel="stylesheet" href="assets/css/indexAdmin.css">
  <link rel="stylesheet" href="assets/css/dataTableStyle.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <style>
    table.dataTable {
      border-collapse: collapse !important;
    }
  </style>
  <!--history-->

  <!-- =======================================================
        * Template Name: Ninestars - v4.3.0
        * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span><img src="assets/img/logofur.png"></span></a></h1>


        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="Adminindex.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
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
          <li><a class="nav-link scrollto" href="#about">Account</a></li>
          <form action="adopterFunction.php" method="POST">
            <li><button class="getstarted scrollto" formmethod="POST" name="logout">Log Out</button></li>
          </form>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Account ======= -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <div class="view-account">
      <section class="module">
        <div class="module-inner">
          <div class="side-bar">
            <div class="user-info">
              <img class="img-profile rounded-circle img-responsive center-block" src="<?php echo "../profileimg/" . $image; ?>" alt="">
              <ul class="meta list list-unstyled">
                <li class="name">
                  <?php echo "<label class='label label-info'>$username</label>" ?>
                </li>
                <li class="email"><a href="#"></a></li>
                <li class="activity">Last logged in: Today at 2:18pm</li>
              </ul>
            </div>
            <nav class="side-menu">
              <ul class="nav">
                <li><a href="accountadopter.php"><span class="fa fa-user"></span> Profile</a></li>
                <li class="active"><a href="history.php"><span class="fa fa-envelope"></span> History</a></li>
                <li><a href="changepassadopter.php"><span class="fa fa-th"></span> Change Password</a></li>


              </ul>
            </nav>
          </div>
          <div class="content-panel">
            <h2 class="title"><b>History</b><span class="pro-label label label-warning"></span></h2>
            <h2 class="title"><span class="pro-label label label-warning"></span></h2>
            <form class="form-horizontal">
              <fieldset class="fieldset">
                <div class="form-group avatar">
                </div>
              </fieldset>

              <fieldset class="fieldset">
                <div class="form-group">
                </div>


                <!-- partial -->

                <div class="main-panel">
                  <div class="content-wrapper">
                    <div class="container">
                      <div class="row">
                        <div class="container col-md-12 mt-2">
                          <h3 class="page-title col-md-1">
                            <center>APPOINTMENT</center>
                          </h3>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="">
                                <div class="">
                                  <?php

                                  $query = "SELECT pets.name, appointment.*
                                            FROM appointment, pets
                                            WHERE appointment.pet=pets.id AND appointment.adopter='$email'
                                            ORDER BY appointment.date DESC";
                                  $query_run = mysqli_query($GLOBALS['con'], $query);

                                  ?>


                                  <!-- On tables -->

                                  <table id="Table" class="table table-light table-hover table-striped table-md">
                                    <thead>
                                      <tr>

                                        <th scope="col" class="th-sm">APPOINTMENT ID</th>
                                        <th scope="col" class="th-sm">PET</th>
                                        <th scope="col" class="th-sm">DATE</th>
                                        <th scope="col" class="th-sm">TIME</th>
                                        <th scope="col" class="th-sm">STATUS</th>

                                      </tr>
                                    </thead>
                                    <tbody>

                                      <?php


                                      if (mysqli_num_rows($query_run) > 0) {

                                        foreach ($query_run as $row) {
                                      ?>
                                          <tr class="text-black">
                                            <td> <?php echo $row['id']; ?> </td>
                                            <td> <?php echo $row['name']; ?> </td>
                                            <td> <?php echo $row['date']; ?> </td>
                                            <td> <?php echo $row['time']; ?> </td>
                                            <td> <?php
                                                  if ($row['status'] == 0) {
                                                    echo "Pending";
                                                  } else if ($row['status'] == 1) {
                                                    echo "Completed";
                                                  } else if ($row['status'] == 2) {
                                                    echo "Cancelled";
                                                  }
                                                  ?> </td>
                                            <!--<td> <?php //echo $row['story']; 
                                                      ?> </td>-->

                                          </tr>

                                        <?php
                                        }
                                      } else {
                                        ?>

                                        <tr>

                                          <td>No Record Available</td>

                                        </tr>

                                      <?php
                                      }
                                      ?>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="container col-md-12 mt-3"></div>
                        <div class="container col-md-12 mt-2">

                          <h3 class="page-title col-md-1">
                            <center>TRANSACTIONS</center>
                          </h3>

                          <?php

                          $query = "SELECT *
                                    FROM transaction
                                    WHERE adopter = '$email'
                                    ORDER BY dated DESC";

                          $query_run = mysqli_query($GLOBALS['con'], $query);

                          ?>

                          <!-- On tables -->
                          <table id="Table" class="table table-light table-hover table-striped table-md">
                            <thead>
                              <tr>

                                <th scope="col" class="th-sm">TRANSACTIONS ID</th>
                                <th scope="col" class="th-sm">TYPE</th>
                                <th scope="col" class="th-sm">DETAILS</th>
                                <th scope="col" class="th-sm">AMOUNT</th>
                                <th scope="col" class="th-sm">REFERENCES</th>
                                <th scope="col" class="th-sm">DATED</th>

                              </tr>
                            </thead>
                            <tbody>

                              <?php


                              if (mysqli_num_rows($query_run) > 0) {

                                foreach ($query_run as $row) {
                              ?>
                                  <tr class="text-black">
                                    <td> <?php echo $row['id']; ?> </td>
                                    <td> <?php echo $row['type']; ?> </td>
                                    <td> <?php echo $row['details']; ?> </td>
                                    <td> <?php echo $row['amount']; ?> </td>
                                    <td> <?php echo $row['ref']; ?> </td>
                                    <td> <?php echo $row['dated']; ?> </td>

                                  </tr>

                                <?php
                                }
                              } else {
                                ?>

                                <tr>

                                  <td>No Record Available</td>

                                </tr>

                              <?php
                              }
                              ?>

                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
  </fieldset>

  <div class="form-group">
  </div>

  <!-- partial -->
  <br><br>


  </div>
  </div>
  </section>
  <!-- End Account -->
  </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('Table').DataTable();
      $('.dataTables_filter').addClass('pull-right');
    });
  </script>
</body>

</html>