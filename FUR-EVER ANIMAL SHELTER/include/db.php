<?php

$dbServername = "localhost";
$dbUsername = "pet2021";
$dbPassword = "fureveranimal";
$dbName = "fureveranimalshelter";

$GLOBALS['con'] = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);