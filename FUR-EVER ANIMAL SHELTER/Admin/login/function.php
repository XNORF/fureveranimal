<?php
	include_once '../../include/db.php';
	session_start();

	if(isSet($_POST['login'])){
		login($_POST);
	} else if (isset($_POST['logout'])) {
		logout($_POST);
	}

	function login(){		
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		
		if(!$GLOBALS['con']){		
			echo mysqli_error($GLOBALS['con']);		
		}else{			
			$sql = "select * from admin WHERE email = '$email' AND password = '$password'";
			$qry = mysqli_query($GLOBALS['con'],$sql);
			$count = mysqli_num_rows($qry);
			
			if($count == 1){
				$userRecord = mysqli_fetch_assoc($qry);
				$_SESSION['admin'] = $email;
				header("Location: ../admin dashboard/indexDashboard.php");	
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