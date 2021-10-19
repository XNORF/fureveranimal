<?php
    session_start();
    if(isset($_POST['updateProfile'])){
        updateProfile($_POST);
    }else if(isset($_POST['updateImg'])){
        header("Location: accountadopter.php?");
    }else if(isset($_POST['changePassword'])){
        changePassword($_POST);
    }else if(isset($_POST['updateCard'])){
        updateCard($_POST);
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

            $sql = "UPDATE adopter SET username='$username', address1='$address1', address2='$address2', postcode='$postcode', city='$city', state='$state' WHERE email='$email'";
        }    
        if(!mysqli_query($con, $sql)){
            //echo mysqli_error($con);
            header("Location: accountadopter.php?update=failed");
            exit();
        }else{
            header("Location: accountadopter.php?update=success");
            exit();
        }
    }

    function changePassword(){
        if($_POST['currentPassword'] !== $_POST['currentPassword2']){
            header("Location: changepassadopter.php?update=different");
        }else if($_POST['newPassword'] !== $_POST['newPassword2']){
            header("Location: changepassadopter.php?update=different");
        }else if((strlen($_POST['currentPassword']) < 6) || (strlen($_POST['newPassword']) < 6)){
            header("Location: changepassadopter.php?update=invalid");
        }else{
            $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
            if(!$con){
                echo mysqli_error($con);
            }else{
                //Construct SQL statement
                $email = $_SESSION['adopter'];
                $currentPassword = md5($_POST['currentPassword']);
                $newPassword = md5($_POST['newPassword']);                
                
                $sql = "SELECT * FROM adopter WHERE email='$email' AND password='$currentPassword'";
                $qry = mysqli_query($con,$sql);            
                $count = mysqli_num_rows($qry);

                if($count == 1){
                    $sql2 = "UPDATE adopter SET password='$newPassword' WHERE email='$email' AND password='$currentPassword'";
                    mysqli_query($con, $sql2);
                    header("Location: changepassadopter.php?update=success");
                    exit();
                }else{
                    header("Location: changepassadopter.php?update=failed");
                    exit();
                }
            }
        }
    }

    function updateCard(){
        
    }
?>