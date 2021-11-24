<?php
include_once '../include/db.php';
if (isset($_POST['updateProfile'])) {
    updateProfile($_POST);
} else if (isset($_POST['updateImg'])) {
    header("Location: accountadmin.php?");
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
                        $sql = "UPDATE admin SET username='$username', address1='$address1', address2='$address2', postcode='$postcode', city='$city', state='$state', image='$image' WHERE email='$email'";
                        if (mysqli_query($GLOBALS['con'], $sql)) {
                            header("Location: admin%20dashboard/pages/samples/accountadmin.php?update=success");
                            exit();
                        } else {
                            //echo mysqli_error($GLOBALS['con']);
                            header("Location: admin%20dashboard/pages/samples/accountadmin.php?update=failed");
                            exit();
                        }
                        
                } else {
                    header("Location: admin%20dashboard/pages/samples/accountadmin.php?update=failed");
                }
            } else {
                $sql = "UPDATE admin SET username='$username', address1='$address1', address2='$address2', postcode='$postcode', city='$city', state='$state' WHERE email='$email'";
                if (mysqli_query($GLOBALS['con'], $sql)) {
                    header("Location: admin%20dashboard/pages/samples/accountadmin.php?update=success");
                    exit();
                } else {
                    //echo mysqli_error($GLOBALS['con']);
                    header("Location: admin%20dashboard/pages/samples/accountadmin.php?update=failed");
                    exit();
                }
            }
    }
}
