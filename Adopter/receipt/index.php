<?php
include_once '../../include/db.php';
session_start();

if (!isset($_SESSION['adopter'])) {
    header('Location: ../index.php');
}

$adopter = $_SESSION['adopter'];

if (!isset($_GET['tid']) && !isset($_GET['cid'])) {
    //header('Location: ../index.php');
} else {
    $tid = $_GET['tid'];
    $cid = $_GET['cid'];

    if (!$GLOBALS['con']) {
        echo mysqli_error($GLOBALS['con']);
    } else {
        //Get transaction table from database
        $sql = "SELECT * FROM transaction WHERE id = '$tid'";
        $qry = mysqli_query($GLOBALS['con'], $sql);
        $count = mysqli_num_rows($qry);

        if ($count == 1) {
            //Get transaction details
            $userRecord = mysqli_fetch_assoc($qry);
            $GLOBALS['id'] = $userRecord['id'];
            $GLOBALS['type'] = $userRecord['type'];
            $GLOBALS['ref'] = $userRecord['ref'];
            $GLOBALS['dated'] = $userRecord['dated'];
            $GLOBALS['amount'] = $userRecord['amount'];

            //Get adopter details
            $sql = "SELECT * FROM adopter WHERE email = '$adopter'";
            $qry = mysqli_query($GLOBALS['con'], $sql);
            $userRecord = mysqli_fetch_assoc($qry);
            $GLOBALS['username'] = $userRecord['username'];


            if ($GLOBALS['type'] == "Adoption") {
                //Get appointment details            
                $sql = "SELECT * FROM appointment WHERE id = '$cid'";
                $qry = mysqli_query($GLOBALS['con'], $sql);
                $userRecord = mysqli_fetch_assoc($qry);
                $GLOBALS['apid'] = $userRecord['id'];
                $GLOBALS['apdate'] = $userRecord['date'];
                $GLOBALS['aptime'] = $userRecord['time'];
                $petid = $userRecord['pet'];

                //Get pet details
                $sql = "SELECT * FROM pets WHERE id = '$petid'";
                $qry = mysqli_query($GLOBALS['con'], $sql);
                $userRecord = mysqli_fetch_assoc($qry);
                $GLOBALS['pettype'] = $userRecord['type'];
                $GLOBALS['petname'] = $userRecord['name'];
                $GLOBALS['petage'] = $userRecord['age'];
                $GLOBALS['petimage'] = $userRecord['image'];
            }
        }
        //$GLOBALS['type'] = "Donation";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    if ($GLOBALS['type'] == "Adoption") {
    ?>
        <title>Adoption Receipt</title>
    <?php
    } else if ($GLOBALS['type'] == "Donation") {
    ?>
        <title>Donation Receipt</title>
    <?php
    }
    ?>

    <!-- Main css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        body {
            background-color: #f598cc;
            font-family: 'Montserrat', sans-serif
        }

        .card {
            border: none
        }

        .logo {
            background-color: #aa52c4
        }

        .totals tr td {
            font-size: 13px
        }

        .footer {
            background-color: #aa52c4
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 13px;
            color: #75cdd9
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 20%;
        }
    </style>
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="text-left logo p-2 px-5"> <img src="" width="50"> </div>


                    <div class="invoice p-5">
                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; " align="center"> Thank You, Hooman ! </h2><br>

                        <img src="deco.jpg" class="center"> <br><br>

                        <?php
                        if ($GLOBALS['type'] == "Adoption") {
                        ?>
                            <h5 style="font-size: 20px; font-weight: 100;  color: #333333;" align="center">Your adoption has been confirmed!</h5>
                        <?php
                        } else if ($GLOBALS['type'] == "Donation") {
                        ?>
                            <h5 style="font-size: 20px; font-weight: 100;  color: #333333;" align="center">Your donation has been confirmed!</h5>

                        <?php
                        }
                        ?>
                    </div>
                    <div class="invoice p-5">
                        <span class="font-weight-bold d-block mt-4">Hello, <?php echo $GLOBALS['username'] ?></span>

                        <?php
                        if ($GLOBALS['type'] == "Adoption") {
                        ?>
                            <span>Your adoption has been confirmed and we are looking forward to you picking up your new fur-ever buddy!</span>
                            <div class="payment border-top mt-3 mb-3 border-bottom ">
                                <table class="table table-borderless">
                                    <tbody>
                                        <th>
                                            <div class="py-2"> <span class="d-block text-muted">Appointment No</span> </div>
                                        </th>
                                        <th>
                                            <div class="py-2"> <span class="d-block text-muted">Appointment Date</span> </div>
                                        </th>
                                        <th>
                                            <div class="py-2"> <span class="d-block text-muted">Date issued</span> </div>
                                        </th>
                                        <th>
                                            <div class="py-2"> <span class="d-block text-muted">Method</span> </div>
                                        </th>

                                        <tr>
                                            <td>
                                                <?php echo $GLOBALS['apid'] ?>
                                            </td>
                                            <td>
                                                <?php echo date('d/m/Y', strtotime($GLOBALS['apdate'])); ?>
                                            </td>
                                            <td>
                                                <?php echo date('d/m/Y', strtotime($GLOBALS['dated'])); ?>
                                            </td>
                                            <td>
                                                Card
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product border-bottom table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td width="20%"> <img src="<?php echo '../../Admin/admin%20dashboard/pages/samples/upload/' . $GLOBALS['petimage'] ?>" width="90"> </td>
                                            <td width="60%"> <span class="font-weight-bold"><?php echo $GLOBALS['petname'] ?></span>
                                                <div class="product-qty"> <span class="d-block">Type: <?php echo $GLOBALS['pettype'] ?></span> <span>Age: <?php echo $GLOBALS['petage'] ?></span> </div>
                                            </td>
                                            <td width="20%">
                                                <div class="text-right"> <span class="font-weight-bold">RM <?php echo $GLOBALS['amount'] ?></span> </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-5">
                                    <table class="table table-borderless">
                                        <tbody class="totals">
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Adoption Fee</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>RM 30</span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Food</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>RM 50</span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Supplies</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>RM 40</span> </div>
                                                </td>
                                            </tr>
                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left"> <span class="font-weight-bold">Subtotal</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span class="font-weight-bold">RM <?php echo $GLOBALS['amount'] ?></span> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        <?php
                        } else if ($GLOBALS['type'] == "Donation") {
                        ?>
                            <span>Your donation has been confirmed and we are looking forward to help more fur-ever buddies with your support!</span>
                            <div class="payment border-top mt-3 mb-3 border-bottom ">
                                <table class="table table-borderless">
                                    <tbody>
                                        <th>
                                            <div class="py-2"> <span class="d-block text-muted">Donation ID</span> </div>
                                        </th>
                                        <th>
                                            <div class="py-2"> <span class="d-block text-muted">Date issued</span> </div>
                                        </th>
                                        <th>
                                            <div class="py-2"> <span class="d-block text-muted">Method</span> </div>
                                        </th>

                                        <tr>
                                            <td>
                                                <?php echo $GLOBALS['id'] ?>
                                            </td>
                                            <td>
                                                <?php echo date('d/m/Y', strtotime($GLOBALS['dated'])); ?>
                                            </td>
                                            <td>
                                                Card
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-5">
                                    <table class="table table-borderless">
                                        <tbody class="totals">
                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left"> <span class="font-weight-bold">Subtotal</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span class="font-weight-bold">RM <?php echo $GLOBALS['amount'] ?></span> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                        <a onclick="window.print()">
                            <p>You can print this receipt by clicking this!</p>
                        </a>
                        <?php
                        if ($GLOBALS['type'] == "Adoption") {
                        ?>
                            <p class="font-weight-bold mb-0">Thanks for adopting our fur-buddies!</p> <span>Love,</span><br><br>
                        <?php
                        } else if ($GLOBALS['type'] == "Donation") {
                        ?>
                            <p class="font-weight-bold mb-0">Thanks for donating to our fur-buddies!</p> <span>Love,</span><br><br>
                        <?php
                        }
                        ?>

                        <img src="logofureveranimal.jpeg" width=30%;> <br><br>

                        <a href="../index.php">
                            <p class="font-weight-bold mb-0">Back to homepage</p>
                        </a>
                    </div>
                    <div class="d-flex justify-content-between footer p-3"> <span>Need Help? Contact us at <a href="../index.php#contact"> Contact Form</a></span> <span><?php echo $GLOBALS['dated']; ?></span> </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>