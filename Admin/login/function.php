<?php
	session_start();

	if(isSet($_POST['login'])){
		login($_POST);
	} else if (isset($_POST['logout'])) {
		logout($_POST);
	}

	function login(){		
		$con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
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
				$_SESSION['admin'] = $email;
				header("Location: ../index.php");	
			}else{
				header("Location: adminLogin.php?login=failed");		
			}		
		}		
	}
		
	function logout(){	
		session_destroy();
		header("Location: ../index.php");
	}
?>