<?php
include_once '../../../../include/db.php';
// database Connection

if (isset($_POST['addPet'])) {
  //the targeted path to store the uploaded image
  $target = "upload/" . basename($_FILES['image']['name']);

  //get submitted data from the form
  $image = $_FILES['image']['name'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $type = $_POST['type'];
  $health = ($_POST['health']);
  $date = $_POST['date'];
  $gender = $_POST['gender'];
  $story = $_POST['story'];

  // Select file type
  $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));

  // valid file extensions
  $extensions_arr = array("jpg", "jpeg", "png", "gif");

  // Check extension
  if (in_array($imageFileType, $extensions_arr)) {

    // Upload files and store in database
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
      // Image db insert sql

      $insert = "INSERT into pets(name, age, type, health, date, gender, story, image) values('$name', '$age', '$type', '$health', '$date', '$gender', '$story', '$image')";
      if (mysqli_query($GLOBALS['con'], $insert)) {
        header("Location: updatePets.php?msg=addSuccess");
      } else {
        echo 'Error: ' . mysqli_error($GLOBALS['con']);
      }
    } else {
      echo 'Error in uploading file - ' . $_FILES['image']['name'] . '<br/>';
    }
  }
} else if (isset($_POST['cancel'])) {
  header("Location: updatePets.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .button {
      background-color: #f44336;
      border: none;
      color: white;
      padding: 10px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
  </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fur-Ever Animal Shelter</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/logofurever.png" />
</head>

<body>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add New Pet Information</h4>
      <p class="card-description"> </p>
      <form class="forms-sample" id="register-form" method="POST" action="#" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Pet Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
          <label for="age"> Age</label>
          <input type="text" class="form-control" id="age" name="age" placeholder="Age" required>
        </div>

        <div class="form-group">
          <label for="gender">Animal Type</label>
          <select class="form-control" id="type" name="type" required>
            <option value="" disabled selected>Animal Type</option>
            <option value="Cat">Cat</option>
            <option value="Dog">Dog</option>
          </select>
        </div>

        <div class="form-group">
          <label for="health">Health Condition/Allergy</label>
          <input type="text" class="form-control" id="health" name="health" placeholder="Health Condition Status" required>
        </div>


        <div class="form-group">
          <label for="date">Date Of Arrival to FAS</label>
          <input type="date" class="form-control" id="date" name="date" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="gender">Pet Gender</label>
          <select class="form-control" id="gender" name="gender" required>
            <option value="" disabled selected>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="form-group">
          <label for="story">Pet Story</label>
          <input type="text" class="form-control" id="story" name="story" placeholder="Pet Story" required>
        </div>

        <div class="form-group">
          <label>Pet Picture upload</label>
          <div class="form-group">
            <input type="file" name="image" id="file" required>
          </div>
          <div class="form-group">


            <button type="submit" class="btn btn-gradient-primary mr-2" name="addPet">Add Pet</button>
            <button class="btn btn-light" name="cancel" formnovalidate>Cancel</button>
          </div>

      </form>
    </div>
  </div>
  </div>
  </form>
  </div>
  </div>
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