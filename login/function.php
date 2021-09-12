<?php
//Handles login & signup functions    
if(isset($_POST['signup'])){
    signup($_POST);
}else if(isset($_POST['login'])){
    login($_POST);
}

function signup(){
    $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
    if(!$con){
        echo mysqli_error($con);
    }else{
        //Construct SQL statement
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];        
        $password = $_POST['password'];
        $phoneNumber = $_POST['phoneNumber'];
        $dob = $_POST['dob'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $postcode = $_POST['postcode'];
        $state = $_POST['state'];
        $verified = 0;
        $vkey = random_int(100000, 999999);

        $sql = "insert into adopter(firstname, lastname, email, password, phoneNumber, dob, address1, address2, postcode, state, verified, vkey, username)
                values('$firstname', '$lastname', '$email', '$password', '$phoneNumber', '$dob', '$address1', '$address2', '$postcode', '$state', '$verified', '$vkey', '$firstname')";
    }    
    if(!mysqli_query($con, $sql));{
        echo mysqli_error($con);
    }
}

function login(){
    $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!$con){
        echo mysqli_error($con);
    }else{
        $sql = "select * from adopter WHERE email = '$email' AND password = '$password' AND verified = '1'";
        $qry = mysqli_query($con,$sql);
        $count = mysqli_num_rows($qry);
        if($count == 1){
            $userRecord = mysqli_fetch_assoc($qry);
            echo "<script type='text/javascript'>
                    alert('Login successful');
                    window.location.href = '../Adopter/index.html'
                    </script>";
        }else{
            $_SESSION['valid'] = false;
            echo "<script type='text/javascript'>
                    alert('Login failed');
                    window.location.href = 'loginmain.php';
                    </script>";
        }
    }
    
}
?>