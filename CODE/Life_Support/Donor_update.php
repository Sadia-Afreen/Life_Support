<?php session_start(); ?>
<html>

<head>
    <title>Update Your Information</title>
    <link rel="stylesheet" href="css/styleD.css">
    <style>
        .error {
            color: #FF0000;
        }

        body {
            background-image: url(images/theme2.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .box {
            color: grey;
            width: 530px;
            border: 1px solid grey;
            border-radius: 2%;
            margin: 0 auto;
            padding-left: 40px;
            background-color: silver;
        }
    </style>
</head>

<body>
    <?php
    include 'db_connection.php';
    $conn = OpenCon();
    $id = $_SESSION["donor_id"];
    $sql = "SELECT * from donor,donor_login,donation_history,donor_medical_history where id='$id' AND D_ID='$id' AND donation_id='$id' AND donor_id='$id'";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result);
    ?>

    <div class="wrapper_full">
        <div class="wrapper">
            <div class="header_con">
                <div class="logo">
                    <img src="images/doc14.png" style="float: left;height: 78px;width: 90px;margin-top: -10px;">
                </div>
                <h1 style="padding-left:80px;font-size: 35px;color:red;font-family: 'Playfair Display', serif;
    font-weight: 900;margin-top: 0;">Life Source Blood Bank</h1>
                <p style="color: red;font-size: 17px;margin-left: 300px; font-weight: 500;margin-top: -30px;">You are somebody’s type, Please donate.</p>
            </div>
            <div class="box">
                <h2 style="text-align: center;color: grey;">Update Information</h2>
                <p><span class="error">* required field</span></p>
                <div class="form_main">
                    <form name="donor-update" method="post" action="Donor-update-form-logic.php" align="center">
                        <h3 align="center">Donor <?php echo $row1['D_Name']; ?> Edit</h3>
                        <br>

                        Name: <input type="text" name="name" value="<?php echo $row1['D_Name']; ?>"><br /><br />
                        Gender:
                        <input type="radio" name="gender" <?php if ($row1['D_Gender'] == 'female') {
                                                                echo 'checked';
                                                            }; ?> value='FEMALE'>Female<br />
                        <input type="radio" name="gender" <?php if ($row1['D_Gender'] == 'male') {
                                                                echo 'checked';
                                                            }; ?> value='MALE'>Male<br />
                        <input type="radio" name="gender" <?php if ($row1['D_Gender'] == 'other') {
                                                                echo 'checked';
                                                            }; ?> value='OTHER'>other<br />
                        <br />
                        Age: <input type="number" name="age" value="<?php echo $row1['D_Age']; ?>"><br /><br />
                        Weight: <input type="text" name="weight" value="<?php echo $row1['D_Weight']; ?>"><br /><br />
                        Blood Group: <input type="text" name="bloodgroup" value="<?php echo $row1['D_BloodGroup']; ?>"><br /><br />
                        Present Address:<br><br>
                        Division:
                        <select name="division">
                            <option <?php if ($row1['D_Division'] == "Dhaka") {
                                        echo 'selected';
                                    }; ?> value="Dhaka">Dhaka</option>
                            <option <?php if ($row1['D_Division'] == "Rajshahi") {
                                        echo 'selected';
                                    }; ?> value="Rajshahi">Rajshahi</option>
                            <option <?php if ($row1['D_Division'] == "Khulna") {
                                        echo 'selected';
                                    }; ?> value="Khulna">Khulna</option>
                            <option <?php if ($row1['D_Division'] == "Chittagong") {
                                        echo 'selected';
                                    }; ?> value="Chittagong">Chittagong</option>
                            <option <?php if ($row1['D_Division'] == "Barishal") {
                                        echo 'selected';
                                    }; ?> value="Barishal">Barishal</option>
                            <option <?php if ($row1['D_Division'] == "Sylhet") {
                                        echo 'selected';
                                    }; ?> value="Sylhet">Sylhet</option>
                            <option <?php if ($row1['D_Division'] == "Rangpur") {
                                        echo 'selected';
                                    }; ?> value="Rangpur">Rangpur</option>
                        </select>
                        <br /><br />
                        Area: <input type="text" name="area" value="<?php echo $row1['D_Area']; ?>"><br /><br />
                        Mobile No.: <input type="number" name="mobile" value="<?php echo $row1['D_Mobile']; ?>"><br /><br />
                        E-mail: <input type="text" name="email" value="<?php echo $row1['D_Email']; ?>"><br /><br />
                        Username: <input type="text" name="username" value="<?php echo $row1['D_Username']; ?>"><br /><br />
                        Password: <input type="password" name="password" value="<?php echo $row1['D_Password']; ?>"><br /><br />

                        Last Donation Hospital's Name: <input type="text" name="hospital" value="<?php echo $row1['Hospital_name']; ?>"><br><br>
                        Last Donation Date: <input type="date" name="lastdon" value="<?php echo $row1['Date']; ?>"><br><br>


                        Smoker:
                        <input type="radio" name="smoker" <?php if (isset($row1['smoker']) && $row1['smoker'] == "Yes") echo "checked"; ?> value="Yes">Yes
                        <input type="radio" name="smoker" <?php if (isset($row1['smoker']) && $row1['smoker'] == "No") echo "checked"; ?> value="No">No
                        <br><br>
                        AIDS:
                        <input type="radio" name="aids" <?php if (isset($row1['aids']) && $row1['aids'] == "Yes") echo "checked"; ?> value="Yes">Yes
                        <input type="radio" name="aids" <?php if (isset($row1['aids']) && $row1['aids'] == "No") echo "checked"; ?> value="No">No
                        <br><br>
                        Allergy: <input type="text" name="allergy" value="<?php echo $row1['allergy']; ?>">
                        <br><br>
                        Blood Pressure:
                        <input type="radio" name="bloodpressure" <?php if (isset($row1['blood_pressure']) && $row1['blood_pressure'] == "High") echo "checked"; ?> value="High">High
                        <input type="radio" name="bloodpressure" <?php if (isset($row1['blood_pressure']) && $row1['blood_pressure'] == "Low") echo "checked"; ?> value="Low">Low
                        <input type="radio" name="bloodpressure" <?php if (isset($row1['blood_pressure']) && $row1['blood_pressure'] == "Normal") echo "checked"; ?> value="Normal">Normal
                        <br><br>
                        <br /><br />

                        <input type="submit" name="submit" value="Update">
                        <input type="reset">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>