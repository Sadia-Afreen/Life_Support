<html>

<head>
    <title>Search By Both</title>
 <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styleD.css">
    <style>
        table,
        td,
        th {
             border: 1px solid dimgray;
            text-align: left;
        }

        table {
             border-collapse: collapse;
            width: 100%;
            background-color: silver;
        }

        th,
        td {
            padding: 15px;
        }


        input[type=text],
        select {
           font-size: 18px;
            width: 30%;
            padding: 12px 20px;
            margin: -3px 470px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
              font-size: 18px;
            width: 30%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: -5px 470px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-transform: uppercase;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        
         body{
            background-image: url(images/theme2.jpg);
            height: 605px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .form_b
        {
            font-family:'Playfair Display', serif ;font-size: 15px;font-weight: 600;text-align: center; text-transform: uppercase;color:darkslategray;

        }
    </style>

</head>

<body>
<div class="wrapper_full">
<div class="wrapper">
     <div class="header_con">
                        <div class="logo">
                    <img src="images/doc14.png" style="float: left;height: 78px;width: 90px;margin-top: -10px;">
                    </div>
                        <h1 style="padding-left:80px;font-size: 35px;color:red;font-family: 'Playfair Display', serif;
    font-weight: 900;margin-top: 0;">Life Source Blood Bank</h1>
                    <p style="color: red;font-size: 17px;margin-left: 300px; font-weight: 500;margin-top: -30px;">You are somebody’s type, Please donate.<br></p>
                    </div>


    <div class="form_b">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <label style="font-family:'Playfair Display', serif ;font-size: 15px;font-weight: 600;text-transform: uppercase;color:darkslategray;" for="bloodgroup">Choose Blood Group:</label><br><br>
            <select id="bloodgroup" name="bloodgroup">
                <option value="A+">A+</option>
                <option value="B+">B+</option>
                <option value="O+">O+</option>
                <option value="AB+">AB+</option>
                <option value="A-">A-</option>
                <option value="B-">B-</option>
                <option value="O-">O-</option>
                <option value="AB-">AB-</option>
            </select>

            <label style="font-family:'Playfair Display', serif ;font-size: 15px;font-weight: 600;text-transform: uppercase;color:darkslategray;" for="division">Choose Division:</label><br><br>
            <select id="division" name="division">
                <option value="Dhaka">Dhaka</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Khulna">Khulna</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Barishal">Barishal</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Rangpur">Rangpur</option>
            </select>
            <br><br>

            Area: <input type="text" name="area">
            <br><br>

            <input type="submit" value="Go">
        </form>
    </div>

    <?php
    include 'db_connection.php';
    $conn = OpenCon();
    $bloodgroup = "";
    $division = $area = "";
    $flag = $flag2 = $flag3 = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bloodgroup = $_POST["bloodgroup"];
        $division = $_POST["division"];
        $area = $_POST["area"];
        $flag = 1;
    }
    $sql = "SELECT status from donor_status";
    $result2 = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($result2);
    if (empty($_POST["area"])) {
        $sql = "SELECT * FROM `donor`  WHERE D_BloodGroup='$bloodgroup' AND D_Division='$division'";
        $result = mysqli_query($conn, $sql);
        $flag2 = 1;
    }
    else
    {
    $sql = "SELECT * FROM `donor` WHERE D_BloodGroup='$bloodgroup' AND D_Division='$division' AND D_Area='$area'";
    $result = mysqli_query($conn, $sql);
    $flag3 = 1;
    }
    if (($flag == 1) && ($flag3 == 1)) { ?>
        <table>
            <tr>
                    
                    <th>Donor ID</th>
                    <th>Donor Status</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Weight</th>
                    <th>Blood Group</th>
                    <th>Division</th>
                    <th>Area</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                <?php
                    }
                    ?>
            </tr>
            <?php
                while (($row1 = mysqli_fetch_assoc($result))) {
                    ?>
                <tr>
                    <td><?php echo $row1["D_ID"] . "<br>"; ?></td>
                    <td><?php echo $row2["status"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Name"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Age"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Gender"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Weight"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_BloodGroup"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Division"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Area"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Email"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Mobile"] . "<br>"; ?></td>
                </tr>
            <?php
                }
                ?>
        </table>
    <?php

    if (($flag == 1) && ($flag2 == 1)) { ?>
        <table>
            <tr>
            <th>Donor ID</th>
                    <th>Donor Status</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Weight</th>
                    <th>Blood Group</th>
                    <th>Division</th>
                    <th>Area</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
            </tr>
            <?php
                while (($row1 = mysqli_fetch_assoc($result))) {
                    ?>
                <tr>
                    <td><?php echo $row1["D_ID"] . "<br>"; ?></td>
                    <td><?php echo $row2["status"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Name"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Age"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Gender"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Weight"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_BloodGroup"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Division"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Area"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Email"] . "<br>"; ?></td>
                    <td><?php echo $row1["D_Mobile"] . "<br>"; ?></td>
                </tr>
            <?php
                }
                ?>
        </table>
    <?php
    }
    ?>
    </div>
</div>
</body>

</html>