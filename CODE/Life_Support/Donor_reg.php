<!DOCTYPE HTML>
<html>

<head>
    <title>Donor Registration Form</title>
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

    <!--php start-->
    <?php
    include 'db_connection.php';
    $conn = OpenCon();
    // echo "Connected Successfully" . '<br><br>';

    // define variables and set to empty values
    $errors = 1;
    $nameErr = $emailErr = $genderErr = $ageErr = $weightErr = $divisionErr = $areaErr = $mobileErr = $bloodgroupErr = $usernameErr = $password_1Err = $password_2Err = $passmatchErr = $smokerErr = $aidsErr = $allergyErr = $bloodpressureErr = $hospitalErr = $lastdonErr = "";
    $name = $email = $gender = $weight = $age = $division = $area = $mobile = $bloodgroup = $username = $smoker = $aids = $allergy = $bloodpressure = $hospital = $lastdon = "";
    $flag = 1;
    $flag2 = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $flag = 0;
        } else {
            $name = test_input($_POST["name"]);
            $flag2 = 1;
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["age"])) {
            $ageErr = "Age is required";
            $flag = 0;
        } else {
            $age = test_input($_POST["age"]);
            $flag2 = 1;
            // check if age only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $age)) {
                $ageErr = "Only numbers allowed";
            }
        }

        if (empty($_POST["weight"])) {
            $weightErr = "Weight is required";
            $flag = 0;
        } else {
            $weight = test_input($_POST["weight"]);
            $flag2 = 1;
            // check if weight only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $weight)) {
                $weightErr = "Only numbers allowed";
            }
        }

        if (empty($_POST["mobile"])) {
            $mobileErr = "Mobile No. is required";
            $flag = 0;
        } else {
            $mobile = test_input($_POST["mobile"]);
            $flag2 = 1;
            // check if mobile only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $mobile)) {
                $mobileErr = "Only numbers allowed";
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
            $flag = 0;
        } else {
            $gender = test_input($_POST["gender"]);
            $flag2 = 1;
        }

        if (empty($_POST["division"])) {
            $divisionErr = "Division is required";
            $flag = 0;
        } else {
            $division = test_input($_POST["division"]);
            $flag2 = 1;
        }

        if (empty($_POST["area"])) {
            $areaErr = "Area is required";
            $flag = 0;
        } else {
            $area = test_input($_POST["area"]);
            $flag2 = 1;
        }

        if (empty($_POST["bloodgroup"])) {
            $bloodgroupErr = "Blood Group is required";
            $flag = 0;
        } else {
            $bloodgroup = test_input($_POST["bloodgroup"]);
            $flag2 = 1;
        }

        if (empty($_POST["hospital"])) {
            $hospitalErr = "hospital is required";
            $flag = 0;
        } else {
            $hospital = test_input($_POST["hospital"]);
            $flag2 = 1;
        }

        if (empty($_POST["lastdon"])) {
            $lastdonErr = "Last Donation Date is required";
            $flag = 0;
        } else {
            $lastdon = test_input($_POST["lastdon"]);
            $flag2 = 1;
        }

        if (empty($_POST["smoker"])) {
            $smokerErr = "Smoking status is required";
            $flag = 0;
        } else {
            $smoker = test_input($_POST["smoker"]);
            $flag2 = 1;
        }

        if (empty($_POST["aids"])) {
            $aidsErr = "AIDS status is required";
            $flag = 0;
        } else {
            $aids = test_input($_POST["aids"]);
            $flag2 = 1;
        }

        if (empty($_POST["allergy"])) {
            $allergyErr = "Allergy status is required";
            $flag = 0;
        } else {
            $allergy = test_input($_POST["allergy"]);
            $flag2 = 1;
        }

        if (empty($_POST["bloodpressure"])) {
            $bloodpressureErr = "Blood Pressure status is required";
            $flag = 0;
        } else {
            $bloodpressure = test_input($_POST["bloodpressure"]);
            $flag2 = 1;
        }

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);



        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
            $errors = 0;
        }


        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $flag = 0;
            $errors = 0;
        } else {
            $email = test_input($_POST["email"]);
            $flag2 = 1;
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["password_1"])) {
            $password_1Err = "Password is required";
            $errors = 0;
        }

        if (empty($_POST["password_2"])) {
            $password_2Err = "Password is required";
            $errors = 0;
        }

        if ($password_1 != $password_2) {
            $passmatchErr = "The two passwords do not match";
            ?><span class="error">* <?php echo $passmatchErr; ?></span><?php
                                                                                $errors = 0;
                                                                            }

                                                                            $user_check_query = "SELECT * FROM donor_login WHERE D_Username='$username' OR D_Email='$email' LIMIT 1";
                                                                            $result = mysqli_query($conn, $user_check_query);
                                                                            $user = mysqli_fetch_assoc($result);

                                                                            if ($user) { // if user exists
                                                                                if ($user['D_Username'] === $username) {
                                                                                    //array_push($errors, "Username already exists");
                                                                                    $userexists = "Username already exists";
                                                                                    ?><span class="error">* <?php echo $userexists; ?></span><?php

                                                                                                                                                            $errors = 0;
                                                                                                                                                        }

                                                                                                                                                        if ($user['D_Email'] === $email) {
                                                                                                                                                            //array_push($errors, "email already exists");
                                                                                                                                                            $emailexists = "Email already exists";
                                                                                                                                                            ?><span class="error">* <?php echo $emailexists; ?></span><?php
                                                                                                                                                                $errors = 0;
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                        //echo $errors;
                                                                                                                                                        // Finally, register user if there are no errors in the form
                                                                                                                                                    }
                                                                                                                                                    function test_input($data)
                                                                                                                                                    {
                                                                                                                                                        $data = trim($data);
                                                                                                                                                        $data = stripslashes($data);
                                                                                                                                                        $data = htmlspecialchars($data);
                                                                                                                                                        return $data;
                                                                                                                                                    }
                                                                                                                                                    ?>


    <!--html form-->
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
                <h2 style="text-align: center;color: grey;">Donor Registration Form</h2>
                <p><span class="error">* required field</span></p>
                <div class="form_main">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        Name: <input type="text" name="name" value="<?php echo $name; ?>">
                        <span class="error">* <?php echo $nameErr; ?></span>
                        <br><br>
                        Gender:
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
                        <span class="error">* <?php echo $genderErr; ?></span>
                        <br><br>
                        Age: <input type="number" name="age" value="<?php echo $age; ?>">
                        <span class="error">* <?php echo $ageErr; ?></span>
                        <br><br>
                        Weight: <input type="text" name="weight" value="<?php echo $weight; ?>">
                        <span class="error">* <?php echo $weightErr; ?></span>
                        <br><br>
                        Blood Group: <input type="text" name="bloodgroup" value="<?php echo $bloodgroup; ?>">
                        <span class="error">* <?php echo $bloodgroupErr; ?></span>
                        <br><br>
                        Present Address:<br><br>
                        Division:
                        <select name="division">
                            <option value="Dhaka">Dhaka</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Rangpur">Rangpur</option>
                        </select>
                        <span class="error">* <?php echo $divisionErr; ?></span>
                        <br><br>
                        Area: <input type="text" name="area" value="<?php echo $area; ?>">
                        <span class="error">* <?php echo $areaErr; ?></span>
                        <br><br>
                        Mobile No.: <input type="number" name="mobile" value="<?php echo $mobile; ?>">
                        <span class="error">* <?php echo $mobileErr; ?></span>
                        <br><br>
                        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
                        <span class="error">* <?php echo $emailErr; ?></span>
                        <br><br>


                        Username: <input type="text" name="username" value="<?php echo $username; ?>">
                        <span class="error">* <?php echo $usernameErr; ?></span>
                        <br><br>
                        Password: <input type="password" name="password_1">
                        <span class="error">* <?php echo $password_1Err; ?></span>
                        <br><br>
                        Confirm Password: <input type="password" name="password_2">
                        <span class="error">* <?php echo $password_2Err; ?></span>
                        <br><br>


                        Last Donation Hospital's Name: <input type="text" name="hospital" value="<?php echo $hospital; ?>">
                        <span class="error">* <?php echo $hospitalErr; ?></span>
                        <br><br>
                        Last Donation Date: <input type="date" name="lastdon" value="<?php echo $lastdon; ?>">
                        <span class="error">* <?php echo $lastdonErr; ?></span>
                        <br><br>


                        Smoker:
                        <input type="radio" name="smoker" <?php if (isset($smoker) && $smoker == "Yes") echo "checked"; ?> value="Yes">Yes
                        <input type="radio" name="smoker" <?php if (isset($smoker) && $smoker == "No") echo "checked"; ?> value="No">No
                        <span class="error">* <?php echo $smokerErr; ?></span>
                        <br><br>
                        AIDS:
                        <input type="radio" name="aids" <?php if (isset($aids) && $aids == "Yes") echo "checked"; ?> value="Yes">Yes
                        <input type="radio" name="aids" <?php if (isset($aids) && $aids == "No") echo "checked"; ?> value="No">No
                        <span class="error">* <?php echo $aidsErr; ?></span>
                        <br><br>
                        Allergy: <input type="text" name="allergy" value="<?php echo $allergy; ?>">
                        <span class="error">* <?php echo $allergyErr; ?></span>
                        <br><br>
                        Blood Pressure:
                        <input type="radio" name="bloodpressure" <?php if (isset($bloodpressure) && $bloodpressure == "High") echo "checked"; ?> value="High">High
                        <input type="radio" name="bloodpressure" <?php if (isset($bloodpressure) && $bloodpressure == "Low") echo "checked"; ?> value="Low">Low
                        <input type="radio" name="bloodpressure" <?php if (isset($bloodpressure) && $bloodpressure == "Normal") echo "checked"; ?> value="Normal">Normal
                        <span class="error">* <?php echo $bloodpressureErr; ?></span>
                        <br><br>


                        <input type="submit" name="submit" value="Submit">

                        <p>
                            Already a member? <a href="Donor_login.php">Sign in</a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php



    if ($flag == 1 && $flag2 == 1 && $errors == 1) {

        $sql = "INSERT INTO donor(D_Age, D_Name, D_Gender, D_Weight, D_BloodGroup, D_Division, D_Area, D_Email, D_Mobile) 
    VALUES('$age', '$name', '$gender', '$weight', '$bloodgroup', '$division', '$area', '$email', '$mobile')";
        $conn->query($sql);
    }


    $sql = "SELECT D_ID from donor where D_Name='$name'";
    $result = mysqli_query($conn, $sql);
    $id = mysqli_fetch_assoc($result);
    $id2 = $id["D_ID"];

    if ($errors == 1) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO donor_login(id, D_Username, D_Email, D_Password) 
  		  VALUES('$id2','$username', '$email', '$password')";
        mysqli_query($conn, $query);
    }

    if ($flag == 1 && $flag2 == 1 && $errors == 1) {

        $sql = "INSERT INTO donor_medical_history(donor_id, smoker, aids, allergy, blood_pressure) 
    VALUES('$id2', '$smoker', '$aids', '$allergy', '$bloodpressure')";
        $conn->query($sql);
    }

    if ($flag == 1 && $flag2 == 1 && $errors == 1) {

        $sql = "INSERT INTO donation_history(donation_id, Hospital_name, Date) 
    VALUES('$id2', '$hospital', '$lastdon')";
        $conn->query($sql);
    }


    if ($flag == 1 && $flag2 == 1 && $errors == 1) {
        $sql = "SELECT Date from donation_history where donation_id='$id2'";
        $result = mysqli_query($conn, $sql);
        $row1 = mysqli_fetch_assoc($result);
        $name = $row1['Date'];

        $now = time(); // or your date as well
        $your_date = strtotime("$name");
        $datediff = $now - $your_date;

        $duration = round($datediff / (60 * 60 * 24));
        if (($duration > 120) && ($age > 18)) {
            $sql = "INSERT INTO donor_status(D_ID, status) 
    VALUES('$id2', 'Can Donate')";
            $conn->query($sql);
        } else {
            $left = 120 - $duration;
            $sql = "INSERT INTO donor_status(D_ID, status) 
    VALUES('$id2', '$left days left to donate')";
            $conn->query($sql);
        }
    }
    $conn->close();
    ?>


</body>

</html>