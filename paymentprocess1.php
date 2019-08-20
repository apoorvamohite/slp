<?php
    require "init.php";
    $name = $_POST['name'];
    $usn = $_POST['usn'];
    $usn = strtoupper($usn);
    $name = ucwords($name);
    $amt = 100;
    $phone = $_POST['phone'];
    $sem = $_POST['sem'];
    $sem = strtoupper($sem);
    $email = $_POST['email'];

    $orderID = "SLP". rand(10000,999999);

    $sql = "INSERT INTO attemptedtxn (orderID, name, usn, phone, sem, email, active) VALUES ('$orderID', '$name', '$usn', '$phone', '$sem', '$email', 0)";
    mysqli_query($con, $sql);

    require_once("./lib/encdec_paytm.php");
    define("merchantMid", "");
    // Key in your staging and production MID available in your dashboard
    define("merchantKey", "");
    // Key in your staging and production merchant key available in your dashboard
    define("orderId", $orderID);
    define("channelId", "WEB");
    define("custId", $usn);
    define("mobileNo", $phone);
    define("email", $email);
    define("txnAmount", 100.0);
    define("website", "WEBSTAGING");
    // This is the staging value. Production value is available in your dashboard
    define("industryTypeId", "Retail");
    // This is the staging value. Production value is available in your dashboard
    define("callbackUrl", "http://localhost/slp/callback.php");
    $paytmParams = array();
    $paytmParams["MID"] = merchantMid;
    $paytmParams["ORDER_ID"] = orderId;
    $paytmParams["CUST_ID"] = custId;
    $paytmParams["MOBILE_NO"] = mobileNo;
    $paytmParams["EMAIL"] = email;
    $paytmParams["CHANNEL_ID"] = channelId;
    $paytmParams["TXN_AMOUNT"] = txnAmount;
    $paytmParams["WEBSITE"] = website;
    $paytmParams["INDUSTRY_TYPE_ID"] = industryTypeId;
    $paytmParams["CALLBACK_URL"] = callbackUrl;
    $paytmChecksum = getChecksumFromArray($paytmParams, merchantKey);
    $transactionURL = "https://securegw-stage.paytm.in/theia/processTransaction";
    //$transactionURL = "https://securegw.paytm.in/theia/processTransaction"; // for production
?>
<html>
    <head>
        <title>Merchant Checkout Page</title>
    </head>
    <body>
        <center><h1>Please do not refresh this page...</h1></center>
        <form method='post' action='<?php echo $transactionURL; ?>' name='f1'>
            <?php
                foreach($paytmParams as $name => $value) {
                    echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
                }
            ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $paytmChecksum ?>">
        </form>
        <script type="text/javascript">
            document.f1.submit();
        </script>
    </body>
</html>