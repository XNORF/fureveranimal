<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Volunteer Registration Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/petowner.jpg" alt="">
                </div>
				
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>Volunteer registration form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name"  >First Name </label>
                                <input type="text" name="name" id="name" required>
                            </div>
							
                            <div class="form-group">
                                <label for="father_name">Last Name </label>
                                <input type="text" name="last_name" id="father_name" required>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label for="address1">Address 1 </label>
                            <input type="text" name="address1" id="address1" required>
                        </div>
						
						<div class="form-group">
                            <label for="address2">Address 2 </label>
                            <input type="text" name="address2" id="address2" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="city">City </label>
                                <div class="form-select">
                                    <input type="text" name="city" id="city" required>
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label for="state">State </label>
                                <div class="form-select">
								<input type="text" name="state" id="state" required>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="pincode">Postcode </label>
                            <input type="text" name="postcode" id="pincode" required>
                        </div>
						
						<div class="form-radio">
                            <label for="gender" class="radio-label">Gender </label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="male" checked required>
                                <label for="male">Male</label>
                                <span class="check"></span>
                            </div>
							
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="female">
                                <label for="female">Female</label>
                                <span class="check"></span>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label for="birth_date">Date Of Birth </label>
                            <input type="date" name="birth_date" id="birth_date" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="course">Do you have any allergies related to animals? (eg: Cat fur) </label>
                            <div class="form-select">
                                <select name="allergy" id="course" required>
                                    <option value=""></option>
                                    <option value="yesOption">Yes, I do</option>
                                    <option value="noOption">No, I don't</option>
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" name="email" id="email" required>
                        </div>
						
                        <div class="form-submit">
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
							<input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
	
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>