<?php
if (isset($_POST['submit'])) {
    signup($_POST['submit']);
} else if (isset($_POST['login'])) {
    login($_POST['login']);
}

?>




<?php
function signup()
{
	$servername = "localhost";
    $username = "master";
    $password = "pet2021";
    $dbname = "fureveranimalshelter";
	
	//1.connect to mysql
	$con = mysqli_connect("localhost","master","pet2021","fureveranimalshelter");
	if(!$con)
		{
		echo mysqli_error();
		}	
	else
	{
		//echo 'connected<br>';
		//2.construct sql statement
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone_number = $_POST['phone_number'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$postcode = $_POST['postcode'];
	$state = $_POST['state'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender']; 
	$payment = $_POST ['payment'];
		
		
		$password = md5($password);
        //Generate Vkey
        $vkey = md5(time() . $username);
		
		
		$sql = "insert into adopter(username, firstname, lastname, email, state, phone_number, postcode, password, address1, address2, dob,  payment,gender,vkey)
			 values('$username', '$firstname', '$lastname', '$email', '$state', '$phone_number', '$postcode', '$password', '$address1', '$address2', '$dob', '$payment', '$gender', '$vkey')";
	    echo $sql;
		
	/* 	//3.run insert query
		if(!mysqli_query($con,$sql))
		{
			//echo mysqli_error($con);
			return mysqli_error($con);
		}
		else
			{
			echo "Record has been successfully added";
			//return "Record has been successfully added";
			} */
		
		
		if ($con->query($sql) === TRUE) {
        $to = $email;
        $subject = "Verify Your Email Address";
        $headers = "From: info.fureveranimal@gmail.com\r\n";
        $headers .= "MIME-Version : 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = "<a href='http://localhost/masterfureveranimal/Adopter/login/register/Verify.php?vkey=$vkey'>Click Here To Verify Your Email Address</a>";

        mail($to, $subject, $message, $headers);

        $sql2 = "INSERT INTO user (email, password, usertype)
                            VALUES('$email', '$password', 'adopter')";
                            if($con->query($sql2) === TRUE){
                                header("Location: /masterfureveranimal/Adopter/login/login.html");
                            }else{
                                echo "Error";
                            }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
		
		
    }
	}
}	


function login()
{
    $servername = "localhost";
    $username = "master";
    $password = "pet2021";
    $dbname = "fureveranimalshelter";

    $mysqli = new mysqli($servername, $username, $password, $dbname);;

    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $password = md5($password);

    $resultSet = $mysqli->query("SELECT * FROM adopter  WHERE email = '$email' AND password = '$password' LIMIT 1 ");


    if ($resultSet->num_rows != 0) {
        //Process login
        $row = $resultSet->fetch_assoc();
        $verified = $row['verified'];
        $email = $row['email'];

        if ($verified == 1) {

            $sql3 = $mysqli->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");

            if ($sql3->num_rows != 0) {

                $row = $sql3->fetch_assoc();
                $usertype = $row['usertype'];

                if($usertype == "adopter"){
                header("Location: /masterfureveranimal/Adopter/index.html");
                }else{
                    header("Location: /masterfureveranimal/Adopter/accountadmin.html");
                }
                
            }
            //Continue
                       
        } else {
            echo  "Please verify your account and try again.";
        }
        
    } else {
        //Invalid login
        echo "Invalid login Credentials";
    }	
	}


?>






