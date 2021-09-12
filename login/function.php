<?php 
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Handles login & signup functions    
    if(isset($_POST['signup'])){
        $vkey = signup($_POST);
        if($vkey!=NULL){
            mailverification($vkey);
            header("Location: register/verification.html");
        }        
    }else if(isset($_POST['login'])){
        login($_POST);
    }else if(isset($_POST['verification'])){
        verification($_POST);
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
            $password = $_POST['password'];
            $phoneNumber = $_POST['phoneNumber'];
            $dob = $_POST['dob'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            $postcode = $_POST['postcode'];
            $state = $_POST['state'];
            $verified = 0;
            $vkey = random_int(100000, 999999);

            $sql = "insert into adopter(firstname, lastname, email, password, phoneNumber, dob, address1, address2, postcode, state, verified, vkey, username)
                    values('$firstname', '$lastname', '$email', '$password', '$phoneNumber', '$dob', '$address1', '$address2', '$postcode', '$state', '$verified', '$vkey', '$firstname')";
            
            $_SESSION['newuser'] = $email;
        }    
        if(!mysqli_query($con, $sql)){
            //echo mysqli_error($con);
            header("Location: register/signup.html");
        }else{
            return $vkey;
        }
    }

    function login(){
        $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!$con){
            echo mysqli_error($con);
        }else{
            $sql = "select * from adopter WHERE email = '$email' AND password = '$password' AND verified = '1'";
            $qry = mysqli_query($con,$sql);
            $count = mysqli_num_rows($qry);
            if($count == 1){
                $userRecord = mysqli_fetch_assoc($qry);
                echo "<script type='text/javascript'>
                        window.location.href = '../Adopter/index.html'
                        </script>";
            }else{
                echo "<script type='text/javascript'>
                        window.location.href = 'loginmain.html';
                        </script>";
            }
        }
        
    }
    
    function verification(){
        $con = mysqli_connect("localhost", "pet2021", "fureveranimal", "fureveranimalshelter");
        $vkey = $_POST['vkey'];
        $user = $_SESSION['newuser'];
        if(!$con){
            echo mysqli_error($con);
        }else{
            $sql = "select * from adopter WHERE email = '$user' AND vkey = '$vkey' AND verified = '0'";
            $qry = mysqli_query($con,$sql);
            $count = mysqli_num_rows($qry);
            if($count == 1){
                $userRecord = mysqli_fetch_assoc($qry);
                $sqlverify = "UPDATE adopter SET verified='1' WHERE email = '$user' AND vkey = '$vkey' AND verified = '0'";
                if(mysqli_query($con,$sqlverify)){
                    echo "<script type='text/javascript'>
                        window.location.href = 'loginmain.html'
                        </script>";
                }
                
            }else{
                echo "<script type='text/javascript'>
                        window.location.href = 'register/verification.html';
                        </script>";
            }
        }
    }

    function mailverification($vkey){
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $subject = "[$vkey] Fur-Ever Animal Verification Code";
        $msg = '<center><img src="https://i.imgur.com/abvuT8n.png" title="source: imgur.com" /><br><h1>Your code is</h1><h1>'.$vkey.'</h1></center>';
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
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>