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

if (isset($_GET['update'])) {
    $updateCheck = $_GET['update'];
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
    <<link rel="stylesheet" href="assets/css/indexAdmin.css">

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
    if (isset($updateCheck)) {
        if ($updateCheck == "failed") {
            echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Password is incorrect!',
                        })
                        </script>";
        } else if ($updateCheck == "success") {
            echo "<script>
                        Swal.fire(
                            'Success',
                            'Password has been updated successfully',
                            'success'
                        )
                        </script>";
        } else if ($updateCheck == "different") {
            echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Passwords are different.',
                        })
                        </script>";
        } else if ($updateCheck == "invalid") {
            echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Password must be 6 characters long.',
                        })
                        </script>";
        }
    }
    ?>
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
                                <li><a href="billingadopter.php"><span class="fa fa-credit-card"></span> Billing</a></li>
                                <li><a href="adoptionhistoryadopter.php"><span class="fa fa-envelope"></span> Adoption History</a></li>
                                <li class="active"><a href="changepassadopter.php"><span class="fa fa-th"></span> Change Password</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                    <div class="content-panel">
                        <h2 class="title"><b>Change Password</b><span class="pro-label label label-warning"></span></h2>
                        <h2 class="title"><span class="pro-label label label-warning"></span></h2>
                        <form class="form-horizontal" action="function.php" method="POST">
                            <fieldset class="fieldset">
                                <div class="form-group avatar">

                                </div>
                            </fieldset>
                            <fieldset class="fieldset">
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">Current Password</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="password" name="currentPassword" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label"></label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="password" name="currentPassword2" class="form-control" value="" placeholder="Re-Type Current Password" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label">New Password</label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="password" name="newPassword" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2  col-sm-3 col-xs-12 control-label"></label>
                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                        <input type="password" name="newPassword2" class="form-control" value="" placeholder="Re-Type New Password" required>
                                    </div>
                                </div>

                            </fieldset>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                    <input class="btn btn-primary" type="submit" name="changePassword" value="Change Password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- End Account -->
        </div>
    </div>