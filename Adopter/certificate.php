<?php
    include_once '../include/db.php';
    session_start();
    $email = $_SESSION['adopter'];
    if(!$GLOBALS['con']){
        echo mysqli_error($GLOBALS['con']);
    }else{
        $sql = "select * from adopter WHERE email = '$email'";        
        $qry = mysqli_query($GLOBALS['con'],$sql);
        $userRecord = mysqli_fetch_assoc($qry);
        $firstName = $userRecord['firstname'];
        $lastName = $userRecord['lastname'];
    }
?>
<html>
    <head>
	<title>Certificate</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
        <style type='text/css'>
			div {
                background-image: url('assets/img/animal bg.jpg');
            }
            body, html {
                margin: 0;
                padding: 0 120px;
            }
            body {
                color: black;
                display: table;
                font-family: Georgia, serif;
                font-size: 24px;
                text-align: center;
            }
            .container {
                border: 20px solid pink;
                width: 750px;
                height: 563px;
                display: table-cell;
                vertical-align: text-top;
                
            }
            .logo {
                color: black;
            }

            .marquee {
                color: black;
                font-size: 48px;
                margin: 20px;
            }
            .assignment {
                margin: 20px;
            }
            .person {
                font-size: 32px;
                font-style: italic;
                margin: 20px auto;
                width: 600px;
            }
            .reason {
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="logo"><img src="assets/img/logofur.png" width="220" height="60" >
            </div>

            <div class="marquee">
                Certificate of Adoption
            </div>

            <div class="assignment">
                This certificate is presented to
            </div>

            <div class="person">
                <?php echo "<u>".$firstName.' '.$lastName."</u>";?>
            </div>

            <div class="reason">
                For welcoming their new animal<br>
                into their home forever.
            </div>
        </div>
    </body>
</html>