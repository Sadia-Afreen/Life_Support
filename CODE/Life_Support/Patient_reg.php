<!DOCTYPE HTML>
<html>

<head>
    <title>Patient Registration Form</title>
    <link rel="stylesheet" href="css/styleD.css">
    <style>
        .error {
            color: #FF0000;
        }
        body{
            background-image: url(images/theme2.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .box{
            color: grey;
         width: 530px;
    border:1px solid grey;
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

    $nameErr = $emailErr = $genderErr = $ageErr = $weightErr = $divisionErr = $areaErr = $mobileErr = $bloodgroupErr = $diseaseErr = "";
    $name = $email = $gender = $weight = $age = $division = $area = $mobile = $bloodgroup = $disease = "";
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
        if (empty($_POST["disease"])) {
            $diseaseErr = "Disease is required";
            $flag = 0;
        } else {
            $disease = test_input($_POST["disease"]);
            $flag2 = 1;
        }
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
    <h2 style="text-align: center;color: grey;">Blood Request Form</h2>
    <p><span class="error">* required field</span></p>
<div class="form_main">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>" >
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
        Disease: <input type="text" name="disease" value="<?php echo $disease; ?>">
        <span class="error">* <?php echo $diseaseErr; ?></span>
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
        <input type="submit" name="submit" value="Submit">

    </form>
</div>
</div>
</div>
</div>
    <?php



    if ($flag == 1 && $flag2 == 1) {
        
        $sql = "INSERT INTO Patient(P_Name, P_Age, P_Email, P_Gender, P_Bloodgroup, P_Weight, P_Disease, P_Division, P_Area, P_Mobile_no) 
    VALUES('$name', '$age', '$email', '$gender', '$bloodgroup', '$weight', '$disease', '$division', '$area','$mobile')";
        $conn->query($sql);
        $conn->close();
    }
    ?>
</body>

</html>