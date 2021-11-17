<?php
if (isset($_GET['error'])) {
    $errorCheck = $_GET['error'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donation | Fur-Ever Animal Shelter</title>

    <!-- Favicons -->
    <link href="../assets/img/logofurever.png" rel="icon">
    <link href="../assets/img/logofurever.png" rel="apple-touch-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php
    if (isset($errorCheck)) {
        if ($errorCheck == "insufficient") {
            echo "<script>
				Swal.fire({
					icon: 'warning',
					title: 'Insufficient Balance',
					text: 'Your card does not have sufficient funds!',
				  })
				</script>";
        } else if ($errorCheck == "declined") {
            echo "<script>
				Swal.fire({
					icon: 'warning',
					title: 'Declined',
					text: 'Your card has been declined, please contact your bank for more information.',
				  })
				</script>";
        }
    }
    ?>

    <div class="main">

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
                    <form action="./charge.php" method="POST" class="register-form" id="payment-form">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="billing">
                                        <h1>Billing Address</h1>
                                    </label><br>
                                    <label for="first_name" class="required">First name</label>
                                    <input type="text" name="firstname" id="first_name" required />
                                </div>

                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" name="lastname" id="last_name" required />
                                </div>

                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="text" name="email" id="email" required />
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="text" name="phone" id="phone_number" required />
                                </div>
                                <br> <label for="payment">
                                    <h1>Payment</h1>
                                </label><br>

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
                                    <input type="text" name="address1" id="address_1" required />
                                </div>
                                <div class="form-input">
                                    <label for="address_2" class="required">Address 2</label>
                                    <input type="text" name="address2" id="address_2" required />
                                </div>
                                <div class="form-input">
                                    <label for="postcode" class="required">Post Code</label>
                                    <input type="text" name="postcode" id="postcode" required />
                                </div>
                                <div class="form-input">
                                    <label for="state" class="required">State</label>
                                    <input type="text" name="state" id="state" required />
                                </div>
                                <br>

                            </div>

                        </div>
                        <div class="donate-us">
                            <div class="form-group">

                                <div class="form-input">
                                    <!-- Used to display form errors -->
                                    <label for="state" class="required">Card Information</label>
                                    <div id="card-errors" role="alert"></div>
                                    <div id="card-element" class="form-control" style="border: 1px solid #ddd">
                                        <!-- a Stripe Element will be inserted here. -->
                                    </div>
                                </div>
                                <div class="form-input">
                                    <label for="state" class="required">Name On Card</label>
                                    <input type="text" name="namecard" id="namecard" required />
                                </div>

                                <div class="form-input">
                                    <label for="state" class="required">Donation Amount (RM)</label>
                                    <input type="number" name="price" id="namecard" min="2" max="999999" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-submit">
                            <button name="orderBtn" class="submit col-md-3">Submit</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/charge.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>