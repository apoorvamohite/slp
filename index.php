<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "head.html"; ?>
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <?php require "navbar.html"; ?>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/bg1.jpg'); filter: blur(1px);">
      </div>
      <div class="container">
        <div class="content-center brand">
          <h1><br><br></h1>
          <img src="assets/img/ieee_logo.png" width="140px" alt="">
	  <h4 style="font-family: 'Graduate', cursive;">IEEE-GIT Student Branch Presents</h4>
          <h1 id="heading" class="h1" style="font-family: 'Graduate', cursive; text-align: left;">Student<br>Leadership<br>Program</h1>
	  <h3 style="font-family: 'Graduate', cursive;">24th August 2019</h3>
          <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#myModal" id="mybutt">
            <i class="now-ui-icons travel_info"></i> &nbsp; Help &nbsp;
          </button>
          <a href="register.php" class="btn btn-primary btn-lg btn-neutral btn-round">
            <i class="now-ui-icons ui-1_send"></i> &nbsp; Register &nbsp;
          </a>
          <a href="#basic-elements" class="btn btn-primary btn-round">
            <i class="now-ui-icons sport_trophy"></i> Info
          </a>
        </div>
        <div style="position: absolute; bottom: 0; right: 0; float: right;">
          <span class="h4">👑</span>
          <span class="h5"><a href="hack.html" style="text-decoration: none; color: white;"> H@ckers Inc.</a></span>&nbsp; apoorva mohite
        </div>
      </div>
    </div>
    <div class="wrapper">
    <div class="section section-basic" id="basic-elements">
      <div class="container">
        <br><br>
        <p>Student Leadership program is a fun, team-building event organized by IEEE GIT.</p>
        <p>Registration fees: Rs. 100/-</p>
        <br>
	      <center><h3><strong>Win Exciting Cash Prizes!</strong></h3></center><br><br>
        <center><h3><strong>2 lucky winners get 50% off on IEEE membership!</strong></h3></center><br><br>
        <ul>
          <li>Fun Learning</li>
          <li>Team Building</li>
          <li>Enhance your leadership skills</li>
          <li>Fun games</li>
          <li>And much more</li>
        </ul>
      </div>
    </div>
  </div>
    <!-- Sart Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="now-ui-icons ui-1_simple-remove"></i>
            </button>
            <h4 class="title title-up">HELP</h4>
          </div>
          <div class="modal-body">
            <p>For any help or queries, contact<br>
              <h6>Student Coordinators:</h6>
              Badrinath Kulkarni: 8867004858<br>
              Ashitosh Patil: 8971773326<br>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--  End Modal -->
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
</body>

</html>