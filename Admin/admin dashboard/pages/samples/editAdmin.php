<?php
  session_start();    
  $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
  
  if(isset($_GET['email'])){
    $email = $_GET['email'];
    $_SESSION['updateAdminID'] = $email;
    if(!$con){
        echo mysqli_error($con);
    }else{
        $sql = "select * from admin WHERE email = '$email'";        
        $qry = mysqli_query($con,$sql);
        $userRecord = mysqli_fetch_assoc($qry);
        $firstName = $userRecord['firstname'];
        $lastName = $userRecord['lastname'];
        $address1 = $userRecord['address1'];
        $address2 = $userRecord['address2'];
        $postcode = $userRecord['postcode'];
        $city = $userRecord['city'];
        $state = $userRecord['state'];
        $phoneNumber = $userRecord['phoneNumber'];
    }

  }

  if(isset($_POST['cancel'])){
    header('Location: ../../updateAdmin.php');
    exit();
  }else if(isset($_POST['update'])){
    updateAdmin($_POST);
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
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
    
        <!-- partial -->
        
			
       
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Update Admins </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../../indexDashboard.php">Back to dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Admins</li>
                </ol>
              </nav>
            </div>
                
				<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Personal Information</h4>
                    <p class="card-description"> </p>
                    <form class="forms-sample" action="#" method="post">
                      <div class="form-group">
                        <label for="exampleInputName1">First name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="First name" name='firstName' value=<?php echo "'$firstName'";?>>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName2">Last name</label>
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="Last name" name='lastName' value=<?php echo "'$lastName'";?>>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPhone"> Phone Number</label>
                        <input type="text" class="form-control" id="exampleInputPhone" placeholder="Phone Number" name='phoneNumber' value=<?php echo "'$phoneNumber'";?>>
                      </div>
					            <div class="form-group">
                        <label for="exampleInputAddress1">Address 1</label>
                        <input type="text" class="form-control" id="exampleInputAddress1" placeholder="Address 1" name='address1' value=<?php echo "'$address1'";?>>
                      </div>
					            <div class="form-group">
                        <label for="exampleInputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="exampleInputAddress2" placeholder="Address 2" name='address2' value=<?php echo "'$address2'";?>>
                      </div>
					            <div class="form-group">
                        <label for="exampleInputPostCode">PostCode</label>
                        <input type="text" class="form-control" id="exampleInputPostCode" placeholder="Postcode" name='postcode' value=<?php echo "'$postcode'";?>>
                      </div>
                     <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="City" name='city' value=<?php echo "'$city'";?>>
                      </div>
					            <div class="form-group">
                        <label for="exampleInputState">State</label>
                        <input type="text" class="form-control" id="exampleInputState" placeholder="State" name='state' value=<?php echo "'$state'";?>>
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
  function updateAdmin(){
    $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
        if(!$con){
            echo mysqli_error($con);
        }else{
            //Construct SQL statement
            $email = $_SESSION['updateAdminID'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $phoneNumber = $_POST['phoneNumber'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            $postcode = $_POST['postcode'];
            $city = $_POST['city'];
            $state = $_POST['state'];

            $sql = "UPDATE admin SET firstname='$firstName', lastname='$lastName', phoneNumber='$phoneNumber', address1='$address1', address2='$address2', postcode='$postcode', city='$city', state='$state' WHERE email='$email'";
        }    
        if(!mysqli_query($con, $sql)){
            //echo mysqli_error($con);
            header('Location: editAdmin.php?email='.$email.'&update=failed');
            exit();
        }else{
          header('Location: editAdmin.php?email='.$email.'&update=success');
            exit();
        }
  }
?>