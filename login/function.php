<?php 
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Handles login & signup functions    
    if(isset($_POST['signup'])){
        if(strlen($_POST['password']) < 6){
            header("Location: register/signup.php?signup=invalidPass");
        }else{
            $vkey = signup($_POST);
            if($vkey!=NULL){
                mailverification($vkey);
                header("Location: loginmain.php?signup=success");
                exit();
            } 
        }
               
    }else if(isset($_POST['login'])){
        login($_POST);
    }else if(isset($_POST['reset'])){
        header("Location: register/signup.php");
        exit();
    }

    function signup(){
        $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
        if(!$con){
            echo mysqli_error($con);
        }else{
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

            $sql = "insert into adopter(firstname, lastname, email, password, phoneNumber, dob, address1, address2, postcode, city, state, verified, vkey, username)
                    values('$firstname', '$lastname', '$email', '$password', '$phoneNumber', '$dob', '$address1', '$address2', '$postcode', '$city', '$state', '$verified', '$vkey', '$firstname')";
            
            $_SESSION['newuser'] = $email;
        }    
        if(!mysqli_query($con, $sql)){
            //echo mysqli_error($con);
            header("Location: register/signup.php?signup=failed");
            exit();
        }else{
            return $vkey;
        }
    }

    function login(){
        $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        if(!$con){
            echo mysqli_error($con);
        }else{
            $sql = "select * from adopter WHERE email = '$email' AND password = '$password' AND verified = '1'"; //Registered & Verified
            $sql2 = "select * from adopter WHERE email = '$email' AND password = '$password' AND verified = '0'"; //Registered & Unverified
            
            $qry = mysqli_query($con,$sql);
            $qry2 = mysqli_query($con,$sql2);
            
            $count = mysqli_num_rows($qry);
            $count2 = mysqli_num_rows($qry2);

            if($count == 1){
                $userRecord = mysqli_fetch_assoc($qry);
                $_SESSION['adopter'] = $email;
                header("Location: ../Adopter/index.php");
            }else if($count2 == 1){
                $_SESSION['verify'] = $email;
                header("Location: loginmain.php?login=unverified");
                exit();
            }else{
                header("Location: loginmain.php?login=failed");
                exit();
            }
        }
        
    }

    function mailverification($vkey){
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $subject = "Fur-Ever Animal Verification";
        $msg = '<center><img src="https://i.imgur.com/abvuT8n.png" title="source: imgur.com" /><br><a href="http://localhost/masterfureveranimal/login/register/verification.php?vkey='.$vkey.'"><h1>Click here to verify</h1></a></center>';
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
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
            echo 'Message has been sent';
            $_SESSION['verify'] = $_SESSION['newuser'];
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>