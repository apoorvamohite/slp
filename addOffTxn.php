<?php
session_start();
if($_SESSION['admin']=='true' && $_SESSION['x']=="abc" && $_SESSION['z']=="xyz"){
?>
<?php
	require 'init.php';
	$name = $_POST['name'];
    $usn = $_POST['usn'];
    $usn = strtoupper($usn);
    $name = ucwords($name);
    $amt = $_POST['amt'];
    $phone = $_POST['phone'];
    $clg = $_POST['clgname'];
    $clg = strtoupper($clg);
    $email = $_POST['email'];
    $orderID = "SLP". rand(10000,999999);

    $sql = "INSERT INTO offline_transactions (orderID, name, usn, phone, clgname, email, amount) VALUES ('$orderID', '$name', '$usn', '$phone', '$clg', '$email', '$amt')";
    $status = mysqli_query($con, $sql);

    if($status==1){
?>
<html>
    <head>
        <title>Add transaction</title>
    </head>
    <body>
        <form method='post' action='inv.php' name='f1'>
            <?php
            	echo '<input type="hidden" name="inv" value="' . $orderID . '">';
                echo '<input type="hidden" name="name" value="' . $name . '">';
                echo '<input type="hidden" name="usn" value="' . $usn . '">';
                echo '<input type="hidden" name="phone" value="' . $phone . '">';
                echo '<input type="hidden" name="clg" value="' . $clg . '">';
                echo '<input type="hidden" name="email" value="' . $email . '">';
                echo '<input type="hidden" name="amt" value="' . $amt . '">';
            ?>
        </form>
        <script type="text/javascript">
            document.f1.submit();
        </script>
    </body>
</html>
<?php
}
else{
    header("Location: inv.php?success=false");
}
?>
<?php
}else{
    header("Location: login.php");
}
?>