<?php
   session_start();
   if(isset($_SESSION['adopter']) || isset($_SESSION['admin'])){
      header("Location: ../index.php");
   }else{
      if(isset($_GET['forgot'])){
         $forgotCheck = $_GET['forgot'];
      }
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Forgot Password</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
	  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <style>
         body {
         background-color: #ffe3f3 ;
         font-family: Nunito Sans;
         }
         .btn {
         background-color: #aa52c4;
         width: 100%;
         color: #fff;
         padding: 10px;
         font-size: 18px;
         }
         .btn:hover {
         background-color: #f598cc ;
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
         if(isset($forgotCheck)){
            if($forgotCheck == "success"){
               echo "<script>
               Swal.fire(
                  'Success!',
                  'An email have been sent, please check your email including spam.',
                  'success'
                )
               </script>";			
            }else if($forgotCheck == "invalid"){
               echo "<script>
               Swal.fire(
                  'Oops...!',
                  'You\'ve inserted an invalid email!',
                  'error'
                )
               </script>";			
            }
         }
      ?>
      <div class="container d-flex justify-content-center align-items-center vh-100">
         <div class="bg-white text-center p-5 mt-3 center">
            <h3>Forgot Password </h3>
            <p>Check your email to reset your password.</p>
            <form class="pb-3" action="function.php" method="post">
               <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="Your Email*" required>
               </div>
               <button type="submit" id="reset" name="resetPass" class="btn">Reset Password</button>
            </form>
            
         </div>
      </div>
   </body>
</html>