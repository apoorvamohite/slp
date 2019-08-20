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
                    <h1 id="heading" class="h1" style="font-family: 'Graduate', cursive;">REGISTER</h1>
                </div>
            </div>
        </div>
        <?php
        require "init.php";
        $res = mysqli_num_rows(mysqli_query($con, "SELECT * FROM transactions")) + mysqli_num_rows(mysqli_query($con, "SELECT * FROM offline_transactions"));
        if($res<=120){
        ?>
        <div class="section section-contact-us text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                        <form method="POST" action="paymentprocess1.php" id="formfield">
                            <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </span>
                                </div>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Name...">
                            </div>
                            <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="now-ui-icons business_badge"></i>
                                    </span>
                                </div>
                                <input name="usn" id="usn" type="text" class="form-control" placeholder="USN...">
                            </div>
                            <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="now-ui-icons tech_mobile"></i>
                                    </span>
                                </div>
                                <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone Number...">
                            </div>
                            <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="now-ui-icons ui-1_email-85"></i>
                                    </span>
                                </div>
                                <input name="email" id="email" type="email" class="form-control" placeholder="Email...">
                            </div>
                            <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="now-ui-icons education_agenda-bookmark"></i>
                                    </span>
                                </div>
                                <input name="sem" id="sem" type="text" class="form-control" placeholder="Semester...">
                            </div>
                            <div class="send-button">
                                <input class="btn btn-primary btn-round btn-block btn-lg" value="Register" id="submitBtn" name="btn" type="button" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }else{
            echo '<br><br><br><div class="container"><h2>Registrations full!</h2></div><br><br>';
        }
        ?>
        <!-- Sart Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <h4 class="title title-up">Confirm</h4>
              </div>
              <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Name:</th>
                        <td id="mname"></td>
                    </tr>
                    <tr>
                        <th>USN:</th>
                        <td id="musn"></td>
                    </tr>
                    <tr>
                        <th>Phone Number:</th>
                        <td id="mphone"></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td id="memail"></td>
                    </tr>
                    <tr>
                        <th>Semester:</th>
                        <td id="msem"></td>
                    </tr>
                    <tr>
                        <th>Amount:</th>
                        <td>Rs. 100/-</td>
                    </tr>
                </table>
              </div>
              <div class="modal-footer">
                <a href="#" class="btn btn-danger" data-dismiss="modal" id="submit">Proceed</a>
              </div>
            </div>
          </div>
        </div>
        <!--  End Modal -->
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
    <script src="./assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
    <script type="text/javascript">
        $('#submitBtn').click(function() {
        	if($("#name").val()!="" && $("#usn").val()!="" && $("#phone").val()!="" && $("#email").val()!="" && $("#clgname").val()!=""){
        		/* when the button in the form, display the entered values in the modal */
        		$('#myModal').modal('show');
        		$('#mname').text($('#name').val());
        		$('#musn').text($('#usn').val());
        		$('#mphone').text($('#phone').val());
        		$('#memail').text($('#email').val());
        		$('#msem').text($('#sem').val());

        	}
             
        });

        $('#submit').click(function(){
             /* when the submit button in the modal is clicked, submit the form */
            //alert('submitting');
            $('#formfield').submit();
        });
    </script>
</body>

</html>