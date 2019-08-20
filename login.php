<?php
session_start();
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
                    <h1 id="heading" class="h1" style="font-family: 'Graduate', cursive;">Login</h1>
                </div>
            </div>
        </div>
        <div class="text-center">
            <div class="title h2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                        <form method="POST" action="check.php">
                            <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </span>
                                </div>
                                <input type="text" name="uname" class="form-control" placeholder="From" required> 
                            </div>
                            <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </span>
                                </div>
                                <input type="password" name="pswd" class="form-control" placeholder="To" required> 
                            </div>
                            <div class="send-button">
                                <input class="btn btn-primary btn-round btn-block btn-lg" value="Login" type="submit" />
                            </div>
                        </form>
                        <?php if(isset($_GET['success']) && $_GET['success']=="false"){
                            echo "Wrong username or password!";
                        }
                        ?>
                    </div>
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
                    <span class="h5"><a href="hack.html" style="text-decoration: none; color: black;"> H@ckers Inc.</a></span>&nbsp; apoorva mohite
                </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
</body>

</html>
