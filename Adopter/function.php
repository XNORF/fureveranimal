<?php
include_once '../include/db.php';
session_start();
if (isset($_POST['updateProfile'])) {
    updateProfile($_POST);
} else if (isset($_POST['changePassword'])) {
    changePassword($_POST);
} else if (isset($_POST['updateCard'])) {
    updateCard($_POST);
}

function updateProfile()
{
    if (!$GLOBALS['con']) {
        echo mysqli_error($GLOBALS['con']);
    } else {
        //Construct SQL statement
        $email = $_POST['email'];
        $username = $_POST['username'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $postcode = $_POST['postcode'];
        $city = $_POST['city'];
        $state = $_POST['state'];

        $image = $_FILES['image']['name'];

        $target = "../profileimg/" . basename($_FILES['image']['name']);

        // Select file type
        $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        // valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {

            // Check extension
            if (in_array($imageFileType, $extensions_arr)) {

                // Image db insert sql
                $sql = "UPDATE adopter SET username='$username', address1='$address1', address2='$address2', postcode='$postcode', city='$city', state='$state', image='$image' WHERE email='$email'";
                if (mysqli_query($GLOBALS['con'], $sql)) {
                    header("Location: accountadopter.php?update=success");
                    exit();
                } else {
                    header("Location: accountadopter.php?update=failed");
                    exit();
                }
            }
        } else {
            $sql = "UPDATE adopter SET username='$username', address1='$address1', address2='$address2', postcode='$postcode', city='$city', state='$state' WHERE email='$email'";
            if (mysqli_query($GLOBALS['con'], $sql)) {
                header("Location: accountadopter.php?update=success");
                exit();
            } else {
                header("Location: accountadopter.php?update=failed");
                exit();
            }
        }
    }
}

function changePassword()
{
    if ($_POST['currentPassword'] !== $_POST['currentPassword2']) {
        header("Location: changepassadopter.php?update=different");
    } else if ($_POST['newPassword'] !== $_POST['newPassword2']) {
        header("Location: changepassadopter.php?update=different");
    } else if ((strlen($_POST['currentPassword']) < 6) || (strlen($_POST['newPassword']) < 6)) {
        header("Location: changepassadopter.php?update=invalid");
    } else {
        if (!$GLOBALS['con']) {
            echo mysqli_error($GLOBALS['con']);
        } else {
            //Construct SQL statement
            $email = $_SESSION['adopter'];
            $currentPassword = md5($_POST['currentPassword']);
            $newPassword = md5($_POST['newPassword']);

            $sql = "SELECT * FROM adopter WHERE email='$email' AND password='$currentPassword'";
            $qry = mysqli_query($GLOBALS['con'], $sql);
            $count = mysqli_num_rows($qry);

            if ($count == 1) {
                $sql2 = "UPDATE adopter SET password='$newPassword' WHERE email='$email' AND password='$currentPassword'";
                mysqli_query($GLOBALS['con'], $sql2);
                header("Location: changepassadopter.php?update=success");
                exit();
            } else {
                header("Location: changepassadopter.php?update=failed");
                exit();
            }
        }
    }
}

function updateCard()
{
    if (!$GLOBALS['con']) {
        echo mysqli_error($GLOBALS['con']);
    } else {
        //Construct SQL statement
        $email = $_SESSION['adopter'];
        $name = $_POST["name"];
        $cardNumber = $_POST["cardNumber"];
        $expDate = $_POST["expDate"] . "-01";
        $cvv = $_POST["cvv"];

        $sql = "SELECT * FROM billing WHERE email='$email'";
        $qry = mysqli_query($GLOBALS['con'], $sql);
        $count = mysqli_num_rows($qry);

        if ($count == 1) {
            $sqlupdate = "UPDATE billing SET name='$name', cardnumber='$cardNumber', expdate='$expDate', cvv='$cvv' WHERE email = '$email'";
            if (!mysqli_query($GLOBALS['con'], $sqlupdate)) {
                header("Location: billingadopter.php?update=failed");
                exit();
            } else {
                header("Location: billingadopter.php?update=success");
                exit();
            }
        } else {
            $sqlinsert = "INSERT INTO billing (email, name, cardnumber, expdate, cvv) VALUES ('$email', '$name', '$cardNumber', '$expDate', '$cvv')";
            if (!mysqli_query($GLOBALS['con'], $sqlinsert)) {
                header("Location: billingadopter.php?update=failed");
                exit();
            } else {
                header("Location: billingadopter.php?update=success");
                exit();
            }
        }
    }
}
