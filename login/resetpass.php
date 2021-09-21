<?php
   session_start();

   if(isset($_GET['vkey'])){
      $_SESSION['resetPassVkey'] = $_GET['vkey'];
      valid();
      if(isset($_GET['reset'])){
			$resetCheck = $_GET['reset'];
		}
   }else{
      header("Location: ../index.php");
   }
   
?>

<!DOCTYPE html>
<html>
<head>
      <title>Reset Password</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <style>
         body {
         background-color: #ffe3f3  ;
         font-family: Nunito Sans;
         }
         .btn {
         background-color: #aa52c4 ;
         width: 100%;
         color: #fff;
         padding: 10px;
         font-size: 18px;
         }
         .btn:hover {
         background-color: #f598cc  ;
         color: #fff;
         }
         input {
         height: 50px !important;
         }
         .form-control:focus {
         border-color: #18dcff;
         box-shadow: none;
         }
         h3 {
         color: #17c0eb;
         font-size: 36px;
         }
         .cw {
         width: 35%;
         }
         @media(max-width: 992px) {
         .cw {
         width: 60%;
         }
         }
         @media(max-width: 768px) {
         .cw {
         width: 80%;
         }
         }
         @media(max-width: 492px) {
         .cw {
         width: 90%;
         }
         }
      </style>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>   
   <?php
		if(isset($resetCheck)){
			if($resetCheck == "invalid"){
				echo "<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Your new password must be at least 6 characters!',
				  })
				</script>";			
			}else if($resetCheck == "different"){
				echo "<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Password doesn\'t match!',
				  })
				</script>";			
			}
		}
	?>
      <div class="container d-flex justify-content-center align-items-center vh-100">
         <div class="bg-white text-center p-5 mt-3 center">
            <h3>Reset Password</h3>
            <p>You can reset your password here.</p>
            <form class="pb-3" action="function.php" method="post">
               <div class="form-group">
                  <input type="password" class="form-control" placeholder="New Password*" name="pass1" required>
               </div>
			      <div class="form-group">
                  <input type="password" class="form-control" placeholder="Confirm New Password*" name="pass2" required>
               </div>
               <button type="submit" class="btn" name="btnReset" formmethod="POST">Reset Password</button>
            </form>
            
         </div>
      </div>
</body>
</html>

<?php
   function valid(){
      
      $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
        if(!$con){
            echo mysqli_error($con);
        }else{
            //Construct SQL statement
            $vkey = $_SESSION['resetPassVkey'];
            $email = $_SESSION['resetPass'];
            $sql = "SELECT * FROM adopter WHERE email='$email' AND vkey='$vkey'";
            $qry = mysqli_query($con, $sql);
            $count = mysqli_num_rows($qry);        
            if($count == 1){
                return true;
            }else{
               header("Location: ../index.php");
            }
        }
   }
?>