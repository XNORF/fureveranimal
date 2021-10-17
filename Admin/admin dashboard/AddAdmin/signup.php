<?php
    if(isset($_GET['signup'])){
        $signupCheck = $_GET['signup'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
		if(isset($signupCheck)){
			if($signupCheck == "invalidPass"){
				echo "<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Your password need to be at least 6 characters!',
				  })
				</script>";			
			}else if($signupCheck == "failed"){
				echo "<script>
				Swal.fire({
					icon: 'error',
					title: 'Sign up failed',
					text: 'You already have an account registered using that email',
				  })
				</script>";			
			}
		}
	?>

    <div class="main" >

        <div class="container">
		
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/catto4.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>Register now </h2>
                        <p>to become a member and adopt our fur buddies !</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form class="register-form" id="register-form" method="POST" action="../UpdateAdminFunction.php">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="first_name" class="required">First name</label>
                                    <input type="text" name="firstname" id="firstname" required placeholder="JOHN"/>
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" name="lastname" id="lastname" required placeholder="DOE"/>
                                </div>
                                
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="text" name="email" id="email" required placeholder="johndoe@gmail.com"/>
                                </div>
								 <div class="form-input">
                                    <label for="password" class="required">Password</label>                                    
                                    <input type="password" name="password" id="password" required placeholder="PLEASE ENTER AT LEAST 6 CHARACTERS."/>
                                                                      
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="text" name="phoneNumber" id="phoneNumber" required placeholder="0123456789"/>
                                </div>
								<div class="form-input">
                                    <label for="DOB" class="required">Date Of Birth</label>
                                    <input type="date" name="dob" id="dob" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-select">
                                    <label for="gender" class="required">Gender</label>                                    
                                    <div class="select-list">
                                        <select name="gender" id="meal_preference" required>
                                            <option disabled selected value> -- select an option -- </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-input">
                                    <label for="address1" class="required">Address 1</label>
                                    <input type="text" name="address1" id="address1" required placeholder="NO. 246 LRG ENAU OFF"/>
                                </div>
                                <div class="form-input">
                                    <label for="address2" class="required">Address 2</label>
                                    <input type="text" name="address2" id="address2" required placeholder="JLN SULTAN AZLAN SHAH"/>
                                </div>
								<div class="form-input">
                                    <label for="postcode" class="required">Postcode</label>
                                    <input type="text" name="postcode" id="postcode" required placeholder="11700"/>
                                </div>
                                <div class="form-input">
                                    <label for="city" class="required">City</label>
                                    <input type="text" name="city" id="city" required placeholder="GELUGOR"/>
                                </div>
                                <div class="form-input">
                                    <label for="state" class="required">State</label>
                                    <input type="text" name="state" id="state" required placeholder="PULAU PINANG"/>
                                </div>
								
                            </div>
                        </div>
                        
                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="signup" />
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" formnovalidate/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>