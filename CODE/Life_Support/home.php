<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Life Source Blood Bank</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div class="whole">
    	<div class="img">
    		<div class="overlay">
    			<div class="header">
    				<h1>Life Source Blood Bank</h1>
    				<div class="clear"></div>
    				<p>You are somebody’s type, Please donate.</p>
    				<div class="clear"></div>
			<div class="logo"><img src="images/doc14.png" height="120" width="150"></div>
    			</div>
    		</div>
    		<div class="clear"></div>
    		<div class="menu">

			<ul>
				<li><a href="#"><h4>Home</h4></a></li>
				<li><a href="#"><h4>Donor</h4></a>
					<ul>
						<li><a href="Donor_login.php"><h4>Sign In</h4></a>
						<li><a href="Donor_reg.php"><h4>Be A Member</h4></a>
					</ul>
				</li>
				<li><a href="#"><h4>Request For Blood</h4></a>
					<ul>
						<li><a href="Patient_reg.php"><h4>Blood Request Form</h4></a>
						<li><a href="Blood_requests.php"><h4>All Blood Requests</h4></a>
					</ul>
				<li><a href="#"><h4>Search For Blood</h4></a>
					<ul>
						<li><a href="SearchBy_BloodGroup.php"><h4>By Blood Group</h4></a></li>
						<li><a href="SearchBy_Location.php"><h4>By Location</h4></a></li>
						<li><a href="SearchBy_Both.php"><h4>By Both</h4></a></li>
					</ul>
				</li>
				<li><a href="Donor_Information.php"><h4>Donor Information</h4></a></li>
				<li><a href="about-2.html"><h4>About Us</h4></a></li>
            </ul>
            <?php
            include 'db_connection.php';
            $conn = OpenCon();
            $sql = "SELECT count(D_ID) FROM `donor` WHERE D_BloodGroup='A+'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?><h2>A+ : <?php echo $row['count(D_ID)'] ?></h2><?php
            $sql = "SELECT count(D_ID) FROM `donor` WHERE D_BloodGroup='A-'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?><h2>A- : <?php echo $row['count(D_ID)'] ?></h2><?php
            $sql = "SELECT count(D_ID) FROM `donor` WHERE D_BloodGroup='B+'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?><h2>B+ : <?php echo $row['count(D_ID)'] ?></h2><?php
            $sql = "SELECT count(D_ID) FROM `donor` WHERE D_BloodGroup='B-'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?><h2>B- : <?php echo $row['count(D_ID)'] ?></h2><?php
            $sql = "SELECT count(D_ID) FROM `donor` WHERE D_BloodGroup='O+'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?><h2>O+ : <?php echo $row['count(D_ID)'] ?></h2><?php
            $sql = "SELECT count(D_ID) FROM `donor` WHERE D_BloodGroup='O-'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?><h2>O- : <?php echo $row['count(D_ID)'] ?></h2><?php
            $sql = "SELECT count(D_ID) FROM `donor` WHERE D_BloodGroup='AB+'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?><h2>AB+ : <?php echo $row['count(D_ID)'] ?></h2><?php
            $sql = "SELECT count(D_ID) FROM `donor` WHERE D_BloodGroup='AB-'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?><h2>AB- : <?php echo $row['count(D_ID)'] ?></h2><?php
			?>
        </div>
       
		
    	</div>
    	<!--<div class="contact">
		<p><h4>Contact:</h4><br><a href="#"><i class="fas fa-phone-alt"></i></a>Phone Number:01816210605,01949328244
		<br><a href="#"><i class="fab fa-facebook"></i></a>https://www.facebook.com/life_source/
		<br><a href="#"><i class="fas fa-envelope"></i></a>info@life_source.Org
		<br><a href="#"><i class="fas fa-map-marker-alt"></i></a>Mirpur Cantonment, Road No 2 Section# 12, 1216
		</p>
		<p><br>© All rights reserved Life_Source.org</p>
    </div>-->
 
	<div class="img2">
			<img src="images/img4-removebg-preview.png" height="440" width="1799">
			<div class="overlay2"> </div>

			

		</div>
		</div>
		
</body>
</html>