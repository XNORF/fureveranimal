<?php
session_start();

if(isSet($_POST['login'])){
    login ($_POST);
	
}
?>


<?php 

function login(){
        $con = mysqli_connect("localhost", "pet2021", "sd2021", "fureveranimalshelter");
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!$con){
            echo "Not connected";
        }else{
            $sql = "select * from login WHERE email = '$email' AND password = '$password'";
            $qry = mysqli_query($con,$sql);
            $count = mysqli_num_rows($qry);
            
            echo "<script type='text/javascript'>
            alert('Log Masuk Berjaya');
            window.location.href = '../Adminindex.html'
            </script>";
        }      
    }

?>