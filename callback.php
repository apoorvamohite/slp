<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
  if ($_POST["STATUS"] == "TXN_SUCCESS") {
    $status = "Transaction successful";
    //Process your transaction here as success transaction.
    //Verify amount & order id received from Payment gateway with your application's order id and amount.
  }
  else {
    $status = "Transaction failed";
  }

  // TRANSACTION STATUS API
    $ORDER_ID = "";
    $requestParamList = array();
    $responseData = array();
    $ORDER_ID = $_POST["ORDERID"];

    // Create an array having all required parameters for status query.
    $requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
        
    $StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
        
    $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

    // Call the PG's getTxnStatusNew() function for verifying the transaction status.
    $responseData = getTxnStatusNew($requestParamList);

    require "init.php";
    $orderID = $paramList['ORDERID'];
    $sql = "SELECT usn FROM attemptedtxn WHERE orderID = '$orderID'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $usn = $row['usn'];

    $txnid = $responseData['TXNID'];
    $txnamt = $responseData['TXNAMOUNT'];
    $txnstatus = $responseData['STATUS'];
    $txntime = $responseData['TXNDATE'];
    $respcode = $responseData['RESPCODE'];
    $banktxnid = $responseData['BANKTXNID'];
    $responseData['PAYMENTMODE'] = "";
    if(isset($responseData['PAYMENTMODE'])){
        $paymentmode = $responseData['PAYMENTMODE'];
    }

    if($respcode == 1){
	$active = 1;
    }
    elseif($txnstatus == "TXN_FAILURE"){
	$active = -1;
    }
    else{
	$active = 0;
    }


    $atm = "UPDATE attemptedtxn SET active=$active, txnid='$txnid', amount='$txnamt', status='$txnstatus', txntime='$txntime', respcode=$respcode, banktxnid='$banktxnid', pm='$paymentmode' WHERE orderID='$ORDER_ID'";
    mysqli_query($con, $atm);

    if($respcode==1){
        $name = "SELECT * FROM attemptedtxn WHERE orderID='$orderID'";
        $res = mysqli_query($con, $name);
        $row = mysqli_fetch_assoc($res);
        $n = $row['name'];
        $p = $row['phone'];
        $s = $row['sem'];
        $e = $row['email'];

        $sql = "INSERT INTO transactions(orderID, usn, name, phone, sem, email, txnid, amount, status, txntime, respcode, banktxnid, pm) VALUES ('$orderID', '$usn', '$n', '$p', '$s', '$e', '$txnid', '$txnamt', '$txnstatus', '$txntime', $respcode, '$banktxnid', '$paymentmode')";
        mysqli_query($con, $sql);
    }
}
else {
  $status="Checksum mismatch";
  //Process transaction as suspicious.
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "head.html"; ?>
</head>

<body class="landing-page sidebar-collapse">
    <!-- Navbar -->
    <?php require "navbar.html"; ?>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url('./assets/img/bg1.jpg');">
            </div>
            <div class="content-center">
                <div class="container">
                    <h3 style="font-family: 'Graduate', cursive;">Student Leadership Program 2019</h3>
                    <h1 id="heading" class="h1" style="font-family: 'Graduate', cursive;">INVOICE</h1>
                </div>
            </div>
        </div>
        <div class="section section-contact-us">
            <div class="container">
                <div class="row">
                    <?php
                    if($respcode==1){
                    ?>
                        <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                            <h4><strong>Invoice Number: <?php echo $orderID; ?></strong><br></h4>
                            <center>
                                <div align="left">
                                    Name: <?php echo $n; ?><br>
                                    USN: <?php echo $usn; ?><br>
                                    Email: <?php echo $e; ?><br>
                                    Phone: <?php echo $p; ?><br>
                                    Payment status: <?php echo "Successful"; ?><br>
                                    Transaction ID: <?php echo $txnid; ?><br>
                                    Bank Transaction ID: <?php echo $banktxnid; ?><br>
                                    Payment Mode: <?php echo $paymentmode; ?><br>
                                    Amount: <?php echo $txnamt; ?><br>
                                </div>
                            </center>
                            <h5>Thank you for registering!</h5>
                            <h6>Please save a screenshot of the above for further reference.</h6>
                        </div>
                    <?php }
                    else{
                        echo "<h3>Transaction failure!</h3>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <footer class="footer footer-default">
            <div class="container">
                <div class="copyright" id="copyright">
                    &copy;
                    <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                    </script>, 
                    <span class="h4">👑</span>
                    <span class="h5"><a href="hack.html"style="text-decoration: none; color: black;"> H@ckers Inc.</a></span>&nbsp; apoorva mohite
                </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
</body>

</html>