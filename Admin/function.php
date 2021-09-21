<?php
    if(isset($_POST['updateProfile'])){
        updateProfile($_POST);
    }else if(isset($_POST['updateImg'])){
        header("Location: accountadmin.php?");
    }

    function updateProfile(){
        $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
        if(!$con){
            echo mysqli_error($con);
        }else{
            //Construct SQL statement
            $email = $_POST['email'];
            $username = $_POST['username'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            $postcode = $_POST['postcode'];
            $city = $_POST['city'];
            $state = $_POST['state'];

            $sql = "UPDATE admin SET username='$username', address1='$address1', address2='$address2', postcode='$postcode', city='$city', state='$state' WHERE email='$email'";
        }    
        if(!mysqli_query($con, $sql)){
            //echo mysqli_error($con);
            header("Location: accountadmin.php?update=failed");
            exit();
        }else{
            header("Location: accountadmin.php?update=success");
            exit();
        }
    }
?>