<?php

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
if (!empty($email)){
if (!empty($password)){
$host = "localhost";
$dbusername = "pet2021";
$dbpassword = "sd2021";
$dbname = "fureveranimalshelter";

// Create connection
$con = new mysqli ("localhost","pet2021","sd2021","fureveranimalshelter");


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_error() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO login (email, password)
values ('$email','$password')";
if ($con->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $con->error;
}
$con->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}
?>