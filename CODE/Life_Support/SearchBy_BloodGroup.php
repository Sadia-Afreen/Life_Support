<html>
    <head>
     <title>Search By Blood Group</title>
         <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styleD.css">
    <style>
         body{
            background-image: url(images/theme2.jpg);
            height: 605px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .boxl{
            color: grey;
         width: 530px;
    border:1px solid grey;
    border-radius: 2%;
    margin: 0 auto;
    padding-left: 40px;
    background-color: silver;
    margin-top: 50px;
        }
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
            margin: 8px 470px;
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
            margin: 8px 470px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-transform: uppercase;
        }

        input[type=submit]:hover {
            background-color: #45a049;
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

    <div class="button">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <label style="font-family:'Playfair Display', serif ;font-size: 18px;font-weight: 600;margin-left:470px;text-transform: uppercase;color:darkslategray;" for="bloodgroup">Choose Blood Group:</label><br>
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
       
            <input type="submit" value="Go">
            
        </form>
    </div>

    <?php
    include 'db_connection.php';
    $conn = OpenCon();
    $bloodgroup = "";
    $flag = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bloodgroup = $_POST["bloodgroup"];
        $flag = 1;
    }

  //  echo $bloodgroup;
  //  echo "<br>";

    $sql = "SELECT * FROM `donor` WHERE D_BloodGroup='$bloodgroup'";
    $result = mysqli_query($conn, $sql);
    $sql = "SELECT status from donor_status";
    $result2 = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($result2);
    if ($flag == 1) { ?>
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
</div>
</div>
</body>

</html>