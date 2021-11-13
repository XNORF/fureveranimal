<?php
include_once '../../../../include/db.php';
session_start();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $_SESSION['updatePetID'] = $id;
  if (!$GLOBALS['con']) {
    echo mysqli_error($GLOBALS['con']);
  } else {
    $sql = "select * from pets WHERE id = '$id'";
    $qry = mysqli_query($GLOBALS['con'], $sql);
    $userRecord = mysqli_fetch_assoc($qry);
    $count = mysqli_num_rows($qry);
    if ($count == 1) {
      $name = $userRecord['name'];
      $age = $userRecord['age'];
      $health = $userRecord['health'];
      $story = $userRecord['story'];
      $image = $userRecord['image'];
      $_SESSION['petImage'] = $image;
    } else {
      header("Location: updatePets.php?pet=invalid");
    }
  }
} else {
  header("Location: updatePets.php?pet=invalid");
}

if (isset($_POST['cancel'])) {
  header("Location: updatePets.php");
  exit();
} else if (isset($_POST['update'])) {
  updatePet($_POST);
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
                'Pet has been updated!',
                'success'
              )
            </script>";
    }
  }
  ?>
  <!-- partial -->



  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Edit Pets </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../indexDashboard.php">Back to dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Pets</li>
        </ol>
      </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Pet Information</h4>
          <p class="card-description"> </p>
          <form class="forms-sample" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
              <label for="exampleInputName">Pet Name</label>
              <?php echo "<input type='text' class='form-control' id='exampleInputPhone' placeholder='Name' name='name' value='$name'required>"; ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPetAge"> Age</label>
              <?php echo "<input type='text' class='form-control' id='exampleInputPhone' placeholder='Age' name='age' value='$age'required>"; ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPetHealth">Health Condition/Allergy</label>
              <?php echo "<input type='text' class='form-control' id='exampleInputPhone' placeholder='Health Condition Status' name='health' value='$health'required>"; ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPetStory">Pet Story</label>
              <?php echo "<input type='text' class='form-control' id='exampleInputPhone' placeholder='Pet Story' name='story' value='$story'required>"; ?>
            </div>
            <div class="form-group">
              <label>Pet Picture upload</label>
              <?php echo "<input type='file' name='image' class='file-upload-default' value='upload/$image'>" ?>

              <div class="input-group col-xs-12">
                <?php echo "<input type='text' class='form-control file-upload-info' disabled placeholder='Upload Image' name='image' value='$image'required>"; ?>
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                </span>
              </div>
            </div>


            <button type="submit" class="btn btn-gradient-primary mr-2" name="update">Update</button>
            <button class="btn btn-light" name="cancel">Cancel</button>
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
function updatePet()
{
  if (!$GLOBALS['con']) {
    echo mysqli_error($GLOBALS['con']);
  } else {
    //Construct SQL statement
    $id = $_SESSION['updatePetID'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $health = $_POST['health'];
    $story = $_POST['story'];
    $image = $_FILES['image']['name'];

    $target = "upload/" . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
      // Image db insert sql

      $sql = "UPDATE pets SET name='$name', age='$age', health='$health', story='$story', image='$image' WHERE id='$id'";
      if (mysqli_query($GLOBALS['con'], $sql)) {
        header("Location: editPets.php?id=$id&update=success");
      } else {
        echo 'Error: ' . mysqli_error($GLOBALS['con']);
      }
    } else {
      $sql = "UPDATE pets SET name='$name', age='$age', health='$health', story='$story' WHERE id='$id'";
      if (mysqli_query($GLOBALS['con'], $sql)) {
        header("Location: editPets.php?id=$id&update=success");
      } else {
        echo 'Error: ' . mysqli_error($GLOBALS['con']);
      }
    }
  }
}
?>