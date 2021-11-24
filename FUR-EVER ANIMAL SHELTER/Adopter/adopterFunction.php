<?php
    session_start();

    if(isset($_POST['logout'])){
        logout($_POST);
    }

    function logout(){
        session_destroy();
        header("Location: index.php");
    }
?>