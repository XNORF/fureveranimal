<!DOCTYPE html>
<html>
   <head>
      <title>Forgot Password</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
   </head>
   <body>
      <div class="container d-flex justify-content-center align-items-center vh-100">
         <div class="bg-white text-center p-5 mt-3 center">
            <h3>Forgot Password </h3>
            <p>Check your email to reset your password.</p>
            <form class="pb-3" action="#">
               <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Email*" required>
               </div>
			   
            </form>
            <button type="button" class="btn">Reset Password</button>
         </div>
      </div>
   </body>
</html>