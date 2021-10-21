<?php 
session_start();

 if(isset($_POST['signup'])){
  if(strlen($_POST['password']) < 6){ //Check if the password is less than 6 in signup form
      header("Location: AddAdmin/signup.php?signup=invalidPass");
  }else{
      signup($_POST);
      header('location: updateAdmin.php');
      exit();
  }               
}else{
  header('location: updateAdmin.php');
  exit();
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


     $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
    if (isset($_GET['del'])) {
      $id = $_GET['del'];
      mysqli_query($con, "DELETE FROM admin WHERE id=$id");
      $_SESSION['message'] = "Address deleted!"; 
      header('location: updateAdmin.php');
      exit();
    }

  
?>