<?php
session_start();
if($_SESSION['admin']=='true' && $_SESSION['x']=="abc" && $_SESSION['z']=="xyz"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "head.html"; ?>
</head>

<body class="landing-page sidebar-collapse">
    <!-- Navbar -->
    <?php require "adminnavbar.html"; ?>
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
                    if(!isset($_GET['success'])){
                    ?>
                        <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                            <h4><strong>Invoice Number: <?php echo $_POST['inv']; ?></strong><br></h4>
                            <center>
                                <div align="left">
                                    Name: <?php echo $_POST['name']; ?><br>
                                    USN: <?php echo $_POST['usn']; ?><br>
                                    Email: <?php echo $_POST['email']; ?><br>
                                    Phone: <?php echo $_POST['phone']; ?><br>
                                    College: <?php echo $_POST['clg']; ?><br>
                                    Amount: <?php echo $_POST['amt']; ?><br>
                                </div>
                                <?php echo '<a href="admin.php" class="btn btn-primary btn-round btn-block btn-lg">New Registration</a>'; ?>
                            </center>
                        </div>
                    <?php }
                    else{
                        echo "There was some error";
                        $_GET['success']="";
                        unset($_GET['success']);
                        echo '<a href="admin.php" class="btn btn-primary btn-round btn-block btn-lg">New Registration</a>';
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
<?php
}else{
    header("Location: login.php");
}
?>