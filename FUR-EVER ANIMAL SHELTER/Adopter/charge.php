<?php
include_once '../include/db.php';
require_once('../vendor/autoload.php');
session_start();

// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
\Stripe\Stripe::setApiKey('sk_test_51JNePKGpwsqBocF8dE1bIkmzxNDAzEt9fWcu3qw1MyIgodHDl6B5E1T6WOd8UESOqxTGLS15ODg0TnPazhZA7pLl004ToFxow0');

$adopter = $_SESSION['adopter'];
$petname = $_POST['petname'];
$petid = $_POST['petid'];
$date = $_POST['date'];
$time = $_POST['time'];
$price = $_POST['price'];

$token = $_POST['stripeToken'];
$cardname = $_POST['cardname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$postcode = $_POST['postcode'];


$address = $address1 . ", " . $address2 . ", " . $postcode . ", " . $city . ", " . $state . ", MY";



try {
    // Create Customer In Stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token,
        "name" => $cardname,
        "phone" => $phone,
    ));

    // Charge Customer
    $charge = \Stripe\Charge::create(array(
        "amount" => $price * 100,
        "currency" => "myr",
        "description" => "Adoption - " . $petname,
        "customer" => $customer->id,
    ));

    //Add sql stuffs here

    if (!$GLOBALS['con']) {
        echo mysqli_error($GLOBALS['con']);
    } else {
        //Add transaction into database        
        $sql = "INSERT into transaction (id, adopter, type, details, amount, ref) VALUES ('$charge->id', '$adopter', 'Adoption', 'Adoption for $petname', '120' ,'$charge->customer')";
        if (!mysqli_query($GLOBALS['con'], $sql)) {
            echo mysqli_error($GLOBALS['con']);
        };

        //Add Appointment into database
        $sql = "INSERT into appointment (id, adopter, pet, date, time, status) VALUES ('$charge->customer', '$adopter', '$petid', '$date', '$time', '0')";
        mysqli_query($GLOBALS['con'], $sql);

        //Decrease slot for availability
        //Find appointment slot based on date
        $sql = "select * from availability WHERE date = '$date'";
        $qry = mysqli_query($GLOBALS['con'], $sql);
        $userRecord = mysqli_fetch_assoc($qry);
        $newslot = $userRecord['slot'] - 1;
        //Minus 1 from slot and update slot        
        $sql = "UPDATE availability SET slot = '$newslot' WHERE date = '$date'";
        mysqli_query($GLOBALS['con'], $sql);

        //Update pet status to 1
        $sql = "UPDATE pets SET status = '1' WHERE id = '$petid'";
        mysqli_query($GLOBALS['con'], $sql);

        // Redirect to success
        header("Location: receipt/index.php?tid=$charge->id&cid=$charge->customer");
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    if ($error == "Your card has insufficient funds.") {
        header("Location: paymentpage.php?pet=$petname&id=$petid&date=$date&time=$time&error=insufficient");
    } else if ($error == "Your card was declined. This transaction requires authentication.") {
        header("Location: paymentpage.php?pet=$petname&id=$petid&date=$date&time=$time&error=declined");
    }
}
