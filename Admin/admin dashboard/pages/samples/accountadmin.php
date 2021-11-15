<?php
include_once '../../../../include/db.php';

session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: ../../../../index.php');
}
$email = $_SESSION['admin'];
if (!$GLOBALS['con']) {
  echo mysqli_error($GLOBALS['con']);
} else {
  $sql = "select * from admin WHERE email = '$email'";
  $qry = mysqli_query($GLOBALS['con'], $sql);
  $userRecord = mysqli_fetch_assoc($qry);
  $id = $userRecord['id'];
  $username = $userRecord['username'];
  $firstName = $userRecord['firstname'];
  $lastName = $userRecord['lastname'];
  $address1 = $userRecord['address1'];
  $address2 = $userRecord['address2'];
  $postcode = $userRecord['postcode'];
  $city = $userRecord['city'];
  $state = $userRecord['state'];
  $profileimg = $userRecord['image'];
}

if (isset($_GET['update'])) {
  $updateCheck = $_GET['update'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fur-Ever Animal Shelter</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../assets/images/logofurever.png" />

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
                    text: 'Something went wrong!',
                })
                </script>";
    } else if ($updateCheck == "success") {
      echo "<script>
                Swal.fire(
                    'Success',
                    'Update Successful',
                    'success'
                )
                </script>";
    }
  }
  ?>

  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="../../../index.php"><img src="assets/images/logofureveranimal.jpeg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="../../../index.php"><img src="assets/images/logofureveranimal.jpeg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="<?php echo "../../../../profileimg/" . $profileimg; ?>" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <?php echo "<p class='mb-1 text-black'>$username</p>"; ?>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../../../index.php?signout=1">
                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count-symbol bg-warning"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                  <p class="text-gray mb-0"> 1 Minutes ago </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                  <p class="text-gray mb-0"> 15 Minutes ago </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                  <p class="text-gray mb-0"> 18 Minutes ago </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">4 new messages</h6>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                  <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                  <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                  <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">See all notifications</h6>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?php echo "../../../../profileimg/" . $profileimg; ?>" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <?php echo "<span class='font-weight-bold mb-2'>$username</span>" ?>
                <span class="text-secondary text-small">FAS Admin</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../indexDashboard.php">
              <span class="menu-title">Dashboard</span>
              <i class=" mdi mdi-star-circle  menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../../index.php">
              <span class="menu-title">Homepage</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="accountadmin.php">
              <span class="menu-title">Account</span>
              <i class=" mdi mdi-face  menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">Check Activity</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-cat  menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="appointmentpage.php"> Upcoming Appointment </a></li>
                <li class="nav-item"> <a class="nav-link" href="adopter-history.php"> Adopter History </a></li>
                <li class="nav-item"> <a class="nav-link" href="transaction-history.php"> Transactions History </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="updateAdmin.php">
              <span class="menu-title">Admins</span>
              <i class="mdi mdi-table-large menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="updatePets.php">
              <span class="menu-title">Pets</span>
              <i class=" mdi mdi-contrast-circle  menu-icon"></i>
            </a>
          </li>
          <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3">Projects</h6>
              </div>
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
              <div class="mt-4">
                <div class="border-bottom">
                  <p class="text-secondary">Categories</p>
                </div>
                <ul class="gradient-bullet-list mt-4">
                  <li>Front-End</li>
                  <li>Back-End</li>
                  <li>Documentation</li>
                </ul>
              </div>
            </span>
          </li>
        </ul>
      </nav>
      <!-- partial -->


      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Edit Information </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account Information</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Account</h4>
                  <p class="card-description"> FAS Admin Account</p>
                  <form class="forms-sample" method="POST" action="../../../function.php" enctype="multipart/form-data">
                    <div class="form-group avatar">
                      <center>
                        <figure class="figure">
                          <img class="img-profile rounded-circle img-responsive center-block" src="<?php echo "../../../../profileimg/" . $profileimg; ?>" alt="" width="200" height="200">
                        </figure>
                      </center>
                    </div>
                    <div class="form-group">
                      <label>Profile Picture upload</label>
                      <input type="file" name="image" class="file-upload-default" value="<?php echo $profileimg; ?>">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" value="<?php echo $username; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="<?php echo $email; ?>" readonly>
                    </div>
                    <div class=" form-group">
                      <label for="exampleInputID">Admin ID Number</label>
                      <input type="text" class="form-control" id="exampleInputID" placeholder="Admin ID Number" name="id" value="<?php echo $id; ?>" readonly>
                    </div>
                    <br><br><br>
                    <button type="submit" class="btn btn-gradient-primary mr-2" name="updateProfile">Update</button>

                </div>
              </div>

            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personal Information</h4>
                  <p class="card-description"></p>
                  <div class="form-group">
                    <label for="exampleInputPassword1">First Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="First Name" name="firstname" value="<?php echo $firstName; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="Last Name" name="lastname" value="<?php echo $lastName; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address 1</label>
                    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Address 1" name="address1" value="<?php echo $address1; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Address 2</label>
                    <input type="text" class="form-control" id="exampleInputConfirmPassword2" placeholder="Address 2" name="address2" value="<?php echo $address2; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Postcode</label>
                    <input type="text" class="form-control" id="exampleInputConfirmPassword2" placeholder="Postcode" name="postcode" value="<?php echo $postcode; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">City</label>
                    <input type="text" class="form-control" id="exampleInputConfirmPassword2" placeholder="City" name="city" value="<?php echo $city; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1">State</label>
                    <input type="text" class="form-control" id="exampleInputConfirmPassword2" placeholder="State" name="state" value="<?php echo $state; ?>">
                  </div>
                  <br><br>
                  <button type="submit" class="btn btn-gradient-primary mr-2" name="updateProfile">Update</button>
                  </form>


                </div>
              </div>
            </div>








            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="../../assets/js/off-canvas.js"></script>
      <script src="../../assets/js/hoverable-collapse.js"></script>
      <script src="../../assets/js/misc.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="../../assets/js/file-upload.js"></script>
      <!-- End custom js for this page -->
</body>

</html>