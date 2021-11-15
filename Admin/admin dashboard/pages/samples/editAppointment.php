<?php
include_once '../../../../include/db.php';

session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: ../../../../index.php');
}


if (isset($_POST['cancel'])) {
  header("Location: appointmentpage.php");
  exit();
} else if (isset($_POST['update'])) {
  updateAppointment($_POST);
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $_SESSION['updateAppointmentID'] = $id;
  if (!$GLOBALS['con']) {
    echo mysqli_error($GLOBALS['con']);
  } else {
    $sql = "SELECT adopter.firstname, adopter.lastname, adopter.phoneNumber, pets.name, appointment.*
    FROM appointment, adopter, pets
    WHERE appointment.adopter=adopter.email AND appointment.pet=pets.id AND appointment.id = 'cus_KaWv1eJSm8L52Z'";
    $qry = mysqli_query($GLOBALS['con'], $sql);
    $userRecord = mysqli_fetch_assoc($qry);
    $count = mysqli_num_rows($qry);
    if ($count == 1) {
      $firstname = $userRecord['firstname'];
      $lastname = $userRecord['lastname'];
      $email = $userRecord['adopter'];
      $phone = $userRecord['phoneNumber'];
      $petname = $userRecord['name'];
      $petid = $userRecord['pet'];
      $date = $userRecord['date'];
      $time = $userRecord['time'];
      $status = $userRecord['status'];
    } else {
      //header("Location: appointmentpage.php?pet=invalid");
    }
  }
} else {
  //header("Location: appointmentpage.php?pet=invalid");
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <?php
  if (isset($updateCheck)) {
    if ($updateCheck == "success") {
      echo "<script type='text/javascript'>
              Swal.fire(
                'Updated!',
                'Appointment has been updated!',
                'success'
              )
            </script>";
    }
  }
  ?>
  <!-- partial -->



  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Edit Appointment </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../indexDashboard.php">Back to dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Appointment</li>
        </ol>
      </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Appointment Information</h4>
          <p class="card-description"> </p>
          <form class="forms-sample" method="POST" action="#">
            <div class="form-group">
              <label for="exampleInputName">First Name</label>
              <input type="text" class="form-control" name=" firstname" id="exampleInputName1" placeholder="First Name" value="<?php echo $firstname ?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputName">Last Name</label>
              <input type="text" class="form-control" name="lastname" id="exampleInputName2" placeholder="Last Name" value="<?php echo $lastname ?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPetAge"> Email</label>
              <input type="text" class="form-control" name="email" id="exampleInputEmail" placeholder="Email" value="<?php echo $email ?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputAnimalType">Phone Number</label>
              <input type="text" class="form-control" name="phonenumber" id="exampleInputPhone" placeholder="Phone Number" value="<?php echo $phone ?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPetHealth">Name Of Animal Adopted</label>
              <input type="text" class="form-control" name="petname" id="exampleInputAnimalAdopted" placeholder="Animal Adopted" value="<?php echo $petname ?>" readonly>
              <input type="hidden" class="form-control" name="petid" value="<?php echo $petid ?>">

            </div>


            <div class="form-group">
              <label for="exampleInputDOA">Date Of Appointment</label>
              <input type="date" class="form-control" name="date" id="exampleInputDate" min="<?php echo date('Y-m-d') ?>" value="<?php echo $date ?>" placeholder="">
            </div>

            <div class="form-group">
              <label for="exampleInputPetStory">Time Of Appointment</label>
              <input type="time" class="form-control" name="time" id="exampleInputTime" value="<?php echo $time ?>" placeholder="">
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Appointment Status</label>
              <select class="form-control" name="status" id="exampleSelectStatus">
                <?php
                if ($status == 0) {
                  echo '<option value="0" hidden selected>Pending</option>';
                } else if ($status == 1) {
                  echo '<option value="1" hidden selected>Completed</option>';
                } else if ($status == 2) {
                  echo '<option value="2" hidden selected>Cancelled</option>';
                }
                ?>
                <option value="0">Pending</option>
                <option value="1">Completed</option>
                <option value="2">Cancelled</option>
              </select>
            </div>


            <button type="submit" class="btn btn-gradient-primary mr-2" name="update">Update</button>
            <button class="btn btn-light" name="cancel">Cancel</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </form>
        </div>
      </div>
    </div>


    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">

    </footer>
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


<?php
function updateAppointment()
{
  if (!$GLOBALS['con']) {
    echo mysqli_error($GLOBALS['con']);
  } else {
    //Construct SQL statement
    $id = $_SESSION['updateAppointmentID'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = $_POST['status'];
    $petid = $_POST['petid'];

    if ($status == '0') {
      $sql = "UPDATE pets SET status='1' WHERE id='$petid'";
    } else if ($status == '1') {
      $sql = "UPDATE pets SET status='2' WHERE id='$petid'";
    } else if ($status == '2') {
      $sql = "UPDATE pets SET status='0' WHERE id='$petid'";
    }

    mysqli_query($GLOBALS['con'], $sql);

    $sql = "UPDATE appointment SET date='$date', time='$time', status='$status' WHERE id='$id'";
    if (mysqli_query($GLOBALS['con'], $sql)) {
      header("Location: editAppointment.php?id=$id&update=success");
    } else {
      echo 'Error: ' . mysqli_error($GLOBALS['con']);
    }
  }
}
?>