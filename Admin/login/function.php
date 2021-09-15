<?php
if(isSet($_POST['login'])){
	login($_POST ['login']);
} else if (isset($_POST['logout'])) {
    logout($_POST['logout']);
}




function login(){
	
	
	$con = mysqli_connect("localhost", "master", "pet2021", "fureveranimalshelter");
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if(!$con){
	
	echo mysqli_error($con);
	
	}else{
		
	$sql = "select * from admin WHERE email = '$email' AND password = '$password'";
	$qry = mysqli_query($con,$sql);
	$count = mysqli_num_rows($qry);
	
	if($count == 1){
		$userRecord = mysqli_fetch_assoc($qry);
		echo "<script type = 'text/javascript'>
		window.location.href = '../index.php' 
		</script>";
	
	}else{
	
	echo "<script type = 'text/javascript'>
		window.location.href = 'adminlogin.php';
	</script>";
	
	} 
	
	}
	
}
	
function logout(){	
	
	session_start();
	unset($_SESSION["email"]);
	unset($_SESSION["password"]);
	header("Location: login.php");

}
		
	
?>