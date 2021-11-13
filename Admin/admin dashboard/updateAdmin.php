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
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">


          <?php
          $query = "SELECT * FROM admin";
          $query_run = mysqli_query($GLOBALS['con'], $query);
          ?>


          <h4 class="card-title">UPDATE ADMIN</h4>
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <!-- On tables -->

                <table class="table table-dark table-hover">
                  <thead>
                    <tr>

                      <th scope="col">FIRST NAME</th>
                      <th scope="col">LAST NAME</th>
                      <th scope="col">EMAIL</th>
                      <th scope="col">PHONE NUMBER</th>
                      <th scope="col">EDIT</th>
                      <th scope="col">DELETE</th>
                    </tr>
                  </thead>

                  <?php

                  if ($query) {
                    foreach ($query_run as $row) {
                  ?>

                      <tbody>
                        <tr>

                          <td> <?php echo $row['firstname']; ?> </td>
                          <td> <?php echo $row['lastname']; ?> </td>
                          <td> <?php echo $row['email']; ?> </td>
                          <td> <?php echo $row['phoneNumber']; ?> </td>



                          <td>
                            <?php
                            $email = $row['email'];
                            echo "<a href='pages/samples/editAdmin.php?email=$email'><button type='button' class='btn btn-success editbtn'>UPDATE</button></a>";
                            ?>


                          </td>
                          <td>
                            <form action="UpdateAdminFunction.php" method="post">
                              <a href="UpdateAdminFunction.php?del=<?php echo $row['id']; ?>" class="btn btn-danger deletebtn">Delete</a>
                            </form>

                        </tr>
                      </tbody>
                  <?php

                    }
                  } else {
                    echo "No Record Found";
                  }

                  ?>

                </table>



            </table>
            <div class="container">
              <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <a href="../admin dashboard/AddAdmin/signup.php">
                <button type="submit" class="btn btn-gradient-primary mr-2">ADD ADMIN</button></a>
              <a href="indexDashboard.php" button type="submit" class="btn btn-gradient-primary mr-2">BACK TO DASHBOARD</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>