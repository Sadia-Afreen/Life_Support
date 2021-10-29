<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>profile</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styleD.css">
    <style>
        body {
            background-image: url(images/theme2.jpg);
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 26px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 2px;
            margin-top: -7px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="wrapper_full">
        <div class="header_con">
            <div class="logo">
                <img src="images/doc14.png" style="float: left;height: 78px;width: 90px;margin-top: -12px;">
            </div>
            <h1 style="padding-left:80px;font-size: 35px;color:red;font-family: 'Playfair Display', serif;
    font-weight: 900;margin-top: 0;">Life Source Blood Bank</h1>
            <p style="color: red;font-size: 17px;margin-left: 300px; font-weight: 500;margin-top: -30px;">You are somebody’s type, Please donate.</p>
        </div>

    </div>
    <div class="wrapper_full">
        <div class="wrapper">
            <a href="after_login.php">
                <h4 style="color:blue;font-size: 20px;margin-right: 20px;font-family: 'Playfair Display', serif;margin-top: -5px;">⬅️Back to Home</h4>
            </a>
            <a href="Donor_update.php" class="button">UPDATE</a>
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="Donor_delete.php" class="button">DELETE</a>
        </div>
    </div>
    <?php
    include 'db_connection.php';
    $conn = OpenCon();
    $id = $_SESSION["donor_id"];
    $sql = "SELECT * from donor,donor_login,donation_history,donor_medical_history,donor_status where id='$id' AND donor.D_ID='$id' AND donation_id='$id' AND donor_id='$id' AND donor_status.D_ID='$id'";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result);
    ?>
    <div class="wrapper_full">
        <h3 style="color:darkslateblue;font-size: 30px;text-align:center;text-decoration: underline; margin-top: -10px;font-family: 'Playfair Display', serif;">Donor Profile</h3>
        <div class="info">
            <h4 style="font-size: 23px;color:darkslateblue;font-family:'Playfair Display', serif;text-decoration: underline;margin-top: -10px; ">Personal Information<br></h4>
            <p style="font-size: 17px;color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -24px; ">Name: <?php echo $row1["D_Name"] ?></p>
            <p style="font-size: 17px;color:darkslateblue;font-family:'Playfair Display', serif;">Age: <?php echo $row1["D_Age"] ?></p>
            <p style="font-size: 17px;color:darkslateblue;font-family:'Playfair Display', serif;">Gender: <?php echo $row1["D_Gender"] ?></p>
            <p style="font-size: 17px;color:darkslateblue;font-family:'Playfair Display', serif;">Division: <?php echo $row1["D_Division"] ?></p>
            <p style="font-size: 17px;color:darkslateblue;font-family:'Playfair Display', serif;">Area: <?php echo $row1["D_Area"] ?></p>
            <p style="font-size: 17px;color:darkslateblue;font-family:'Playfair Display', serif;">Mobile: <?php echo $row1["D_Mobile"] ?></p>
            <p style="font-size: 17px;color:darkslateblue;font-family:'Playfair Display', serif;">Weight: <?php echo $row1["D_Weight"] ?></p>
            <p style="font-size: 17px;color:darkslateblue;font-family:'Playfair Display', serif;">Email: <?php echo $row1["D_Email"] ?><br></p>

        </div>
    </div>
    <div class="wrapper_full">
        <div class="wrapper_info">
            <h4 style="font-size:22px; color:darkslateblue;font-family:'Playfair Display', serif;text-decoration: underline;margin-top: -10px;">Login Credentials:</h4>
            <p style="font-size:17px; color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -10px;">Username: <?php echo $row1["D_Username"] ?></p>
            <p style="font-size:17px; color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -10px;">Password: <?php echo $row1["D_Password"] ?></p>
            <h4 style="font-size:22px; color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -10px;">Medical Information: </h4>
            <p style="font-size:17px; color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -10px;">AIDS: <?php echo $row1["aids"] ?></p>
            <p style="font-size:17px; color:darkslateblue;font-family:'Playfair Display', serif;
		    margin-top: -10px;">Smoker: <?php echo $row1["smoker"] ?></p>
            <p style="font-size:17px; color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -10px;">Allergic: <?php echo $row1["allergy"] ?></p>
            <p style="font-size:17px; color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -10px;">Blood Pressure: <?php echo $row1["blood_pressure"] ?></p>
            <h4 style="font-size:22px; color:darkslateblue;font-family:'Playfair Display', serif;text-decoration: underline;margin-top: -10px;">Last Donation History</h4>
            <p style="font-size:17px; color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -10px;">Last Donation Date: <?php echo $row1["Date"] ?></p>
            <p style="font-size:17px; color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -10px;">Hospital Name: <?php echo $row1["Hospital_name"] ?></p>
            <h4 style="font-size:22px; color:darkslateblue;font-family:'Playfair Display', serif;text-decoration: underline;margin-top: -10px;">Donor Status: </h4><p style="font-size:17px; color:darkslateblue;font-family:'Playfair Display', serif;margin-top: -10px;"><?php echo $row1["status"] ?></p>
        </div>
    </div>
</body>

</html>