<?php
    include_once '../../include/db.php';
    session_start();
    if(isset($_GET['vkey'])){
        $vkey = $_GET['vkey'];
        verification($vkey);
    }else{
        header("Location: ../loginmain.php?verify=invalid");
        exit();
    }

    function verification($vkey){
        $user = $_SESSION['verify'];
        if(!$GLOBALS['con']){
            echo mysqli_error($GLOBALS['con']);
        }else{
            $sql = "select * from adopter WHERE email = '$user' AND vkey = '$vkey' AND verified = '0'";
            $qry = mysqli_query($GLOBALS['con'],$sql);
            $count = mysqli_num_rows($qry);

            if($count == 1){
                $userRecord = mysqli_fetch_assoc($qry);
                $sqlverify = "UPDATE adopter SET verified = '1' WHERE email = '$user' AND vkey = '$vkey'";
                if(mysqli_query($GLOBALS['con'],$sqlverify)){
                    unset($_SESSION['verify']);
                    header("Location: ../loginmain.php?verify=success");
                    exit();
                }                
            }else{
                header("Location: ../loginmain.php?verify=failed");
                exit();
            }
        }
    }
?>