<?php 
session_start();

if(isset($_POST['delete_btn']))
{
    delete_btn($_POST['delete_btn']);
}

    //signup functions    
    else if(isset($_POST['signup'])){
        if(strlen($_POST['password']) < 6){ //Check if the password is less than 6 in signup form
            header("Location: AddAdmin/signup.php?signup=invalidPass");
        }else{
            $vkey = signup($_POST);
            if($vkey!=NULL){
                //mailverification($vkey);
                header("Location: loginmain.php?signup=success");
                exit();
            } 
        }               
    }
?>

<?php

    function signup(){ //Signup Function and return VKEY for verification
        $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
        if(!$con){
            echo mysqli_error($con);
        }else{
            //Construct SQL statement
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];        
            $password = md5($_POST['password']);
            $phoneNumber = $_POST['phoneNumber'];
            $dob = $_POST['dob'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            $postcode = $_POST['postcode'];
            $city = $_POST['city'];
            $state = $_POST['state'];
          

            $sql = "insert into admin(firstname, lastname, email, password, phoneNumber, dob, address1, address2, postcode, city, state,username)
                    values('$firstname', '$lastname', '$email', '$password', '$phoneNumber', '$dob', '$address1', '$address2', '$postcode', '$city', '$state', '$firstname')";
            
         
        }    
        if(!mysqli_query($con, $sql)){
            //echo mysqli_error($con);
            header("Location: AddAdmin/signup.php?signup=failed");
            exit();
        }else{
            return 0;
        }
    }



	if (isset($_POSt['delete_btn']))
	{
			$id=$_POST['delete_id'];

			$query ="DELETE FROM admin WHERE id='$id' ";
			$query_run=mysqli_query($connection, $query);

			if($query_run)
			{
	$_SESSION['success'] = "Your data is Deleted";
	header("Location:updateAdmin.php");
			}
			else{
				$_SESSION['status'] = "Your data is Deleted";
	header("Location:updateAdmin.php");
			}
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
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>



<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">

                       
                <?php
                  $connection = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
                  $db = mysqli_select_db($connection,'fureveranimalshelter');

                  $query = "SELECT * FROM admin";
                  $query_run = mysqli_query($connection,$query);
                  ?>


                    <h4 class="card-title">UPDATE ADMIN</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <!-- On tables -->

                          <table class="table table-dark table-hover">
                          <thead>
    <tr>
      <th scope ="col">ID</th>
      <th scope ="col">FIRST NAME</th>
      <th scope ="col">LAST NAME</th>
      <th scope ="col">EMAIL</th>
      <th scope ="col">PHONE NUMBER</th>
      <th scope ="col">EDIT</th>
      <th scope ="col">DELETE</th>
</tr>
</thead>

<?php

if ($query)
{
    foreach($query_run as $row)
    {
      ?>

<tbody>
 <tr>
      <td> <?php echo $row['id'];?> </td>
      <td> <?php echo $row['firstname'];?> </td>
      <td> <?php echo $row['lastname'];?> </td>
      <td> <?php echo $row['email'];?> </td>
      <td> <?php echo $row['phoneNumber'];?> </td>
     


    <td>
    <a  href="../accountadmin.php">
    <button type="button" class="btn btn-success editbtn">UPDATE</button></a>
    </td> 
    <td> 
      <form action="UpdateAdminFunction.php" method="post">
        <input type="hidden" name="emailhidden" value= ".$id.">
    <button type="submit" name="deletebtn"  value= ".$id." class="btn btn-danger deletebtn">DELETE</button>                          

    </form>
    <td>

    </td>

</tr>
</tbody>
<?php

}     
}
else 
{
echo"No Record Found";
}