<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donation Form</title>

<!-- Favicons -->
  <link href="assets/img/logofurever.png" rel="icon">
  <link href="assets/img/logofurever.png" rel="apple-touch-icon">
  
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
                    <img src="images/doggo.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>Donate now </h2>
                        <p>For a better future for our fur buddies !</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
								<label for="billing"><h1>Billing Address</h1></label><br>
                                    <label for="first_name" class="required">First name</label>
                                    <input type="text" name="first_name" id="first_name" />
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" name="last_name" id="last_name" />
                                </div>
                                
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="text" name="email" id="email" />
                                </div>
								<div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="text" name="phone_number" id="phone_number" />
                                </div>
								<br> <label for="payment"><h1>Payment</h1></label><br>
								<div class="form-input">
                                    <label for="state" class="required">Name On Card</label>
                                    <input type="text" name="namecard" id="namecard" />
                                </div>
								<div class="form-input">
                                    <label for="state" class="required">Credit Card Number</label>
                                    <input type="text" name="cardnumber" id="cardnumber" />
                                </div>
								<div class="form-input">
                                    <label for="state" class="required">Exp Month</label>
                                    <input type="text" name="expmonth" id="expmonth" />
                                </div>
								 
                            </div>
                            <div class="form-group">
                                <div class="form-select">
                                    <div class="label-flex">
									
                                        
                                    </div>
                                </div>
                                <div class="form-radio">
                                    <div class="label-flex">
                                       
                                    </div>
                                    <div class="form-radio-group">            
                                        <div class="form-radio-item">
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="form-input"><br><br>
								
                                    <label for="address_1" class="required">Address 1</label>
                                    <input type="text" name="address_1" id="address_1" />
                                </div>
                                <div class="form-input">
                                    <label for="address_2" class="required">Address 2</label>
                                    <input type="text" name="address_2" id="address_2" />
                                </div>
								<div class="form-input">
                                    <label for="postcode" class="required">Post Code</label>
                                    <input type="text" name="postcode" id="postcode" />
                                </div>
                                <div class="form-input">
                                    <label for="state" class="required">State</label>
                                    <input type="text" name="state" id="state" />
                                </div>
								<br>
								<div class="form-input"><br><br><br><br><br>
                                    <label for="state" class="required">Exp Year</label>
                                    <input type="text" name="expyear" id="expyear" />
                                </div>
								<div class="form-input">
                                    <label for="state" class="required">CVV</label>
                                    <input type="text" name="cvv" id="cvv" />
									
                                </div>
								
                            </div>
                        </div>
                        <div class="donate-us">
                            <label>Donate us  </label>
                            <div class="price_slider ui-slider ui-slider-horizontal">
                                <div id="slider-margin"></div>
                                <span class="donate-value" id="value-lower"></span>
                            </div>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
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