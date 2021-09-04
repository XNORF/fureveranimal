<?php
	

session_start();
   
  include("connection.php");
  include("function.php");

  
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
	  //something was posted
	  $username = $_POST['email'];
	  $password = $_POST['password'];					 
		  	 
	  if(!empty($email) && !empty($password) &&  !is_numeric($email))
	  {	
		  //read from database
		  $query = "select * from login where email = '$email' limit 1";
		  
		  $result = mysqli_query($con, $query);
		  
		  if($result)
		  {
		  if($result && mysqli_num_rows($result) > 0)
	          {    
		  $user_data = mysqli_fetch_assoc($result);
		  
			if($user_data['password'] === $password)
			  {
				
				$_SESSION['email'] = $user_data['email'];
				header("Location: htdocs/masterfureveranimal/Admin/index.html"); 	
		        die;
			      }
	          } 
		  }
		  echo '<script>alert("Incorect email or password")</script>'; 
		  
	  }else
	  {
		  echo '<script>alert("Incorect email or password")</script>';
	  }
  }

?>

