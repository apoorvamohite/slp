<!DOCTYPE html>
<html>
<head>
  <?php require "head.html"; ?>
</head>
<body>
  <div class="container">
    <br>
    <h3>All Participants </h3>
    <div class="table-responsive">          
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Sl.no</th>
	    <th>Invoice</th>
            <th>Name</th>
            <th>College</th>
            <th>Phone Number</th>
            <th>Accomodation</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require "init.php";
            $sql = "SELECT * FROM transactions";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);
            $i = 0;
            while($row=mysqli_fetch_assoc($res)){
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
		echo "<td>".$row['orderID']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['clgname']."</td>";
                echo "<td>".$row['phone']."</td>";
		if($row['acc']==0){ $acc="No"; } else{ $acc="Yes";}
                echo "<td>".$acc."</td></tr>";
            }
            echo "Total registrations: ".$count;
          ?>
        </tbody>
      </table>
    </div>
<footer class="footer" style="position: fixed;">
        <div class="container">
            <div class="copyright" id="copyright">
                &copy;
                <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script>, <span class="h3">👑</span><span class="h5"><a href="hack.html"> H@ckers Inc.</a></span> apoorva mohite, komal chitragar, mrunal ambekar
            </div>
        </div>
      </footer>
  </div>
  
</body>
</html>