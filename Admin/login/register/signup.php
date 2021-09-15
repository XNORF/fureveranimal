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
</head>
<body>

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
                    <form class="register-form" id="register-form" method="POST" action="../function.php">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="first_name" class="required">First name</label>
                                    <input type="text" name="firstname" id="firstname" required/>
                                </div>
								
                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" name="lastname" id="lastname" required/>
                                </div>
                                
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="text" name="email" id="email" required/>
                                </div>
								
								 <div class="form-input">
                                    <label for="password" class="required">Password</label>
                                    <input type="password" name="password" id="password" required/>
                                </div>
								
                                <div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="text" name="phoneNumber" id="phoneNumber" required/>
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
								
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label for="payment" class="required">Have you owned a pet before?</label>
                                        <a href="#" class="form-link"></a>
                                    </div>
                                    <div class="form-radio-group">            
                                        <div class="form-radio-item">
                                            <input type="radio" name="payment" id="cash" class="required" checked>
                                            <label for="cash">Yes</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="payment" id="cheque">
                                            <label for="cheque">No</label>
                                            <span class="check"></span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-input">
                                    <label for="address1" class="required">Address 1</label>
                                    <input type="text" name="address1" id="address1" required/>
                                </div>
                                <div class="form-input">
                                    <label for="address2" class="required">Address 2</label>
                                    <input type="text" name="address2" id="address2" required/>
                                </div>
								<div class="form-input">
                                    <label for="postcode" class="required">Post Code</label>
                                    <input type="text" name="postcode" id="postcode" required/>
                                </div>
                                <div class="form-input">
                                    <label for="state" class="required">State</label>
                                    <input type="text" name="state" id="state" required/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="signup" />
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
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