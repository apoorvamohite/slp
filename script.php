<?php
require "init.php";
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$from = $_POST['from'];
$to = $_POST['to'];

if($to==""){
	$last = mysqli_query($con, "SELECT MAX(slno) FROM attemptedtxn");
	$lastno = mysqli_fetch_array($last);
	$to = $lastno[0];
}

$sql = "SELECT orderID FROM attemptedtxn WHERE slno>=$from AND slno<=$to AND active=0";
$res= mysqli_query($con, $sql);

$suc=0;
$tot=0;

while($row= mysqli_fetch_assoc($res)){
	$ORDER_ID=$row['orderID'];
	$requestParamList = array();
	$responseData = array();

	// Create an array having all required parameters for status query.
	$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
	    
	$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
	    
	$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

	// Call the PG's getTxnStatusNew() function for verifying the transaction status.
	$responseData = getTxnStatusNew($requestParamList);

	$txnid = $responseData['TXNID'];
    $txnamt = $responseData['TXNAMOUNT'];
    $txnstatus = $responseData['STATUS'];
    $txntime = $responseData['TXNDATE'];
    $respcode = $responseData['RESPCODE'];
    $banktxnid = $responseData['BANKTXNID'];
    $paymentmode = "";
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
    $r = mysqli_query($con, $atm);
    if($r === TRUE)
    {
	echo "Added: ".$ORDER_ID."Active: ".$active."<br/>"; $tot++;
    }

    if($respcode==1){
        $name = "SELECT * FROM attemptedtxn WHERE orderID='$ORDER_ID'";
        $res = mysqli_query($con, $name);
        $row = mysqli_fetch_assoc($res);
        $n = $row['name'];
        $u = $row['usn'];
        $p = $row['phone'];
        $s = $row['sem'];
        $e = $row['email'];

        $sql = "INSERT INTO transactions(orderID, usn, name, phone, sem, email, txnid, amount, status, txntime, respcode, banktxnid, pm) VALUES ('$ORDER_ID', '$u', '$n', '$p', '$s', '$e', '$txnid', '$txnamt', '$txnstatus', '$txntime', $respcode, '$banktxnid', '$paymentmode')";
        $r1 = mysqli_query($con, $sql);
	if($r1 === TRUE)
	{
		echo "Added success: ".$ORDER_ID."<br/>";
        	$suc++;
	}
        
    }
    
}
echo "Total: ".$tot;
echo "<br/>";
echo "Success: ".$suc;
?>