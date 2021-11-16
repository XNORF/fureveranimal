<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../include/db.php';
//Load Composer's autoloader
require 'vendor/autoload.php';

//Handles login & signup functions    
if (isset($_POST['signup'])) {
    if (strlen($_POST['password']) < 6) { //Check if the password is less than 6 in signup form
        header("Location: register/signup.php?signup=invalidPass");
    } else {
        $vkey = signup($_POST);
        if ($vkey != NULL) {
            mailverification($vkey);
        }
    }
} else if (isset($_POST['login'])) { //Handle login form
    login($_POST);
} else if (isset($_POST['reset'])) { //Handle reset form in signup
    header("Location: register/signup.php");
    exit();
} else if (isset($_POST['resetPass'])) { //Handle reset password for forgot password
    $vkey = getVkey($_POST);
    resetPasswordMail($vkey);
} else if (isset($_POST['btnReset'])) {
    resetPassword($_POST);
}


function signup()
{ //Signup Function and return VKEY for verification
    if (!$GLOBALS['con']) {
        echo mysqli_error($GLOBALS['con']);
    } else {
        //Construct SQL statement
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $phoneNumber = $_POST['phoneNumber'];
        $dob = $_POST['dob'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $postcode = $_POST['postcode'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $verified = 0;
        $vkey = md5(random_int(100000, 999999));
        $image = "default.png";

        $sql = "insert into adopter(firstname, lastname, email, password, phoneNumber, dob, address1, address2, postcode, city, state, verified, vkey, username, image)
                    values('$firstname', '$lastname', '$email', '$password', '$phoneNumber', '$dob', '$address1', '$address2', '$postcode', '$city', '$state', '$verified', '$vkey', '$firstname', '$image')";

        $_SESSION['newuser'] = $email;
    }
    if (!mysqli_query($GLOBALS['con'], $sql)) {
        //echo mysqli_error($GLOBALS['con']);
        header("Location: register/signup.php?signup=failed");
        exit();
    } else {
        return $vkey;
    }
}

function login()
{ //Login Function
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    if (!$GLOBALS['con']) {
        echo mysqli_error($GLOBALS['con']);
    } else {
        $sql = "select * from adopter WHERE email = '$email' AND password = '$password' AND verified = '1'"; //Registered & Verified
        $sql2 = "select * from adopter WHERE email = '$email' AND password = '$password' AND verified = '0'"; //Registered & Unverified

        $qry = mysqli_query($GLOBALS['con'], $sql);
        $qry2 = mysqli_query($GLOBALS['con'], $sql2);

        $count = mysqli_num_rows($qry);
        $count2 = mysqli_num_rows($qry2);

        if ($count == 1) {
            $userRecord = mysqli_fetch_assoc($qry);
            $_SESSION['adopter'] = $email;
            header("Location: ../Adopter/index.php");
        } else if ($count2 == 1) {
            $_SESSION['verify'] = $email;
            header("Location: loginmain.php?login=unverified");
            exit();
        } else {
            header("Location: loginmain.php?login=failed");
            exit();
        }
    }
}

function mailverification($vkey)
{ //Send an email for signup verification
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $subject = "Fur-Ever Animal Verification";
    $msg = '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
            <style>

            #button {
                display: inline-block;
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                border-radius: 8px;
                -webkit-box-shadow:    0 8px 0 #c5376d, 0 15px 20px rgba(0, 0, 0, .35);
                -moz-box-shadow: 0 8px 0 #c5376d, 0 15px 20px rgba(0, 0, 0, .35);
                box-shadow: 0 8px 0 #c5376d, 0 15px 20px rgba(0, 0, 0, .35);
                -webkit-transition: -webkit-box-shadow .1s ease-in-out;
                -moz-transition: -moz-box-shadow .1s ease-in-out;
                -o-transition: -o-box-shadow .1s ease-in-out;
                transition: box-shadow .1s ease-in-out;
                font-size: 25px;
                color: #fff;
            }

            #button span {
                display: inline-block;
                padding: 20px 30px;
                background-color: #ec528d;
                background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(hsla(338, 90%, 80%, .8)), to(hsla(338, 90%, 70%, .2)));
                background-image: -webkit-linear-gradient(hsla(338, 90%, 80%, .8), hsla(338, 90%, 70%, .2));
                background-image: -moz-linear-gradient(hsla(338, 90%, 80%, .8), hsla(338, 90%, 70%, .2));
                background-image: -o-linear-gradient(hsla(338, 90%, 80%, .8), hsla(338, 90%, 70%, .2));
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                border-radius: 8px;
                -webkit-box-shadow: inset 0 -1px 1px rgba(255, 255, 255, .15);
                -moz-box-shadow: inset 0 -1px 1px rgba(255, 255, 255, .15);
                box-shadow: inset 0 -1px 1px rgba(255, 255, 255, .15);
                font-family: Arial, sans-serif;
                line-height: 1;
                text-shadow: 0 -1px 1px rgba(175, 49, 95, .7);
                -webkit-transition: background-color .2s ease-in-out, -webkit-transform .1s ease-in-out;
                -moz-transition: background-color .2s ease-in-out, -moz-transform .1s ease-in-out;
                -o-transition: background-color .2s ease-in-out, -o-transform .1s ease-in-out;
                transition: background-color .2s ease-in-out, transform .1s ease-in-out;
            }

            #button:hover span {
                background-color: #ec6a9c;
                text-shadow: 0 -1px 1px rgba(175, 49, 95, .9), 0 0 5px rgba(255, 255, 255, .8);
            }

            #button:active, #button:focus {
                -webkit-box-shadow:    0 8px 0 #c5376d, 0 12px 10px rgba(0, 0, 0, .3);
                -moz-box-shadow: 0 8px 0 #c5376d, 0 12px 10px rgba(0, 0, 0, .3);
                box-shadow:    0 8px 0 #c5376d, 0 12px 10px rgba(0, 0, 0, .3);
            }

            #button:active span {
                -webkit-transform: translate(0, 4px);
                -moz-transform: translate(0, 4px);
                -o-transform: translate(0, 4px);
                transform: translate(0, 4px);
            }
            </style>
        </head>
        <body>
            <center>
                <br>
                <img src="https://i.imgur.com/abvuT8n.png" title="source: imgur.com" /><br>
                <a href="http://localhost/masterfureveranimal/login/register/verification.php?vkey=' . $vkey . '" id="button">
                <span>Click here to verify</span>
                </a>
                <br>
                <p>© 2021 Fur-Ever Animals Shelter. All Rights Reserved</p>
            </center>
        </body>
    </html>    
    ';

    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.fureveranimal.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'noreply@fureveranimal.com';                     //SMTP username
        $mail->Password   = 'fureveranimal';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreply@fureveranimal.com', 'Fur-Ever Animal Shelter');
        //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($_SESSION['newuser']);               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $msg;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $_SESSION['verify'] = $_SESSION['newuser'];

        echo '<script>window.location.replace("loginmain.php?signup=success");</script>';

        //header("Location: loginmain.php?signup=success");
        //exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function getVkey()
{
    if (!$GLOBALS['con']) {
        echo mysqli_error($GLOBALS['con']);
    } else {
        //Construct SQL statement
        $email = $_POST['email'];

        $sql = "SELECT vkey FROM adopter WHERE email='$email'";
        $qry = mysqli_query($GLOBALS['con'], $sql);
        $count = mysqli_num_rows($qry);
        if ($count == 1) {
            $userRecord = mysqli_fetch_assoc($qry);
            $_SESSION['resetPass'] = $email;
            return $userRecord['vkey'];
        } else {
            header("Location: forgotpass.php?forgot=invalid");
            exit();
        }
    }
}

function resetPasswordMail($vkey)
{ //Send an email for signup verification
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $subject = "Fur-Ever Animal Reset Password";
    $msg = '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
            <style>

            #button {
                display: inline-block;
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                border-radius: 8px;
                -webkit-box-shadow:    0 8px 0 #c5376d, 0 15px 20px rgba(0, 0, 0, .35);
                -moz-box-shadow: 0 8px 0 #c5376d, 0 15px 20px rgba(0, 0, 0, .35);
                box-shadow: 0 8px 0 #c5376d, 0 15px 20px rgba(0, 0, 0, .35);
                -webkit-transition: -webkit-box-shadow .1s ease-in-out;
                -moz-transition: -moz-box-shadow .1s ease-in-out;
                -o-transition: -o-box-shadow .1s ease-in-out;
                transition: box-shadow .1s ease-in-out;
                font-size: 25px;
                color: #fff;
            }

            #button span {
                display: inline-block;
                padding: 20px 30px;
                background-color: #ec528d;
                background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(hsla(338, 90%, 80%, .8)), to(hsla(338, 90%, 70%, .2)));
                background-image: -webkit-linear-gradient(hsla(338, 90%, 80%, .8), hsla(338, 90%, 70%, .2));
                background-image: -moz-linear-gradient(hsla(338, 90%, 80%, .8), hsla(338, 90%, 70%, .2));
                background-image: -o-linear-gradient(hsla(338, 90%, 80%, .8), hsla(338, 90%, 70%, .2));
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                border-radius: 8px;
                -webkit-box-shadow: inset 0 -1px 1px rgba(255, 255, 255, .15);
                -moz-box-shadow: inset 0 -1px 1px rgba(255, 255, 255, .15);
                box-shadow: inset 0 -1px 1px rgba(255, 255, 255, .15);
                font-family: Arial, sans-serif;
                line-height: 1;
                text-shadow: 0 -1px 1px rgba(175, 49, 95, .7);
                -webkit-transition: background-color .2s ease-in-out, -webkit-transform .1s ease-in-out;
                -moz-transition: background-color .2s ease-in-out, -moz-transform .1s ease-in-out;
                -o-transition: background-color .2s ease-in-out, -o-transform .1s ease-in-out;
                transition: background-color .2s ease-in-out, transform .1s ease-in-out;
            }

            #button:hover span {
                background-color: #ec6a9c;
                text-shadow: 0 -1px 1px rgba(175, 49, 95, .9), 0 0 5px rgba(255, 255, 255, .8);
            }

            #button:active, #button:focus {
                -webkit-box-shadow:    0 8px 0 #c5376d, 0 12px 10px rgba(0, 0, 0, .3);
                -moz-box-shadow: 0 8px 0 #c5376d, 0 12px 10px rgba(0, 0, 0, .3);
                box-shadow:    0 8px 0 #c5376d, 0 12px 10px rgba(0, 0, 0, .3);
            }

            #button:active span {
                -webkit-transform: translate(0, 4px);
                -moz-transform: translate(0, 4px);
                -o-transform: translate(0, 4px);
                transform: translate(0, 4px);
            }
            </style>
        </head>
        <body>
            <center>
                <br>
                <img src="https://i.imgur.com/abvuT8n.png" title="source: imgur.com" /><br>
                <a href="http://localhost/masterfureveranimal/login/resetpass.php?vkey=' . $vkey . '" id="button">
                <span>Reset your password</span>
                </a>
                <br>
                <p>© 2021 Fur-Ever Animals Shelter. All Rights Reserved</p>
            </center>
        </body>
    </html>    
    ';
    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.fureveranimal.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'noreply@fureveranimal.com';                     //SMTP username
        $mail->Password   = 'fureveranimal';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreply@fureveranimal.com', 'Fur-Ever Animal Shelter');
        //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($_SESSION['resetPass']);               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $msg;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<script>window.location.replace("forgotpass.php?forgot=success");</script>';

        //header("Location: forgotpass.php?forgot=success");
        //exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function resetPassword()
{
    $vkey = $_SESSION['resetPassVkey'];
    $email = $_SESSION['resetPass'];


    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if (strlen($pass1) < 6 || strlen($pass2) < 6) {
        header("Location: resetpass.php?reset=invalid&vkey=$vkey");
        exit();
    } else if ($pass1 == $pass2) {
        $password = md5($pass1); // ADD MD5 LATER
        if (!$GLOBALS['con']) {
            echo mysqli_error($GLOBALS['con']);
        } else {
            //Construct SQL statement                       
            $sql = "UPDATE adopter SET password='$password' WHERE vkey='$vkey' AND email='$email'";
            if (!mysqli_query($GLOBALS['con'], $sql)) {
                //echo mysqli_error($GLOBALS['con']);
                header("Location: loginmain.php?reset=failed");
                exit();
            } else {
                unset($_SESSION['resetPassVkey']);
                unset($_SESSION['resetPass']);
                header("Location: loginmain.php?reset=success");
                exit();
            }
        }
    } else {
        header("Location: resetpass.php?reset=different&vkey=$vkey");
        exit();
    }
}
