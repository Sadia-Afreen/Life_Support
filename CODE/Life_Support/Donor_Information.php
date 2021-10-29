<html>

<head>
  <title>All Donor Information</title>
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styleD.css">
  <style>
    table,
    td,
    th {
      border: 1px solid #ddd;
      text-align: left;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      padding: 15px;
    }
    body{
            background-image: url(images/theme2.jpg);
            height: 605px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }
  </style>
</head>

<body>

  <?php
  include 'db_connection.php';
  $conn = OpenCon();

  $sql = "SELECT * FROM donor";
  $result = mysqli_query($conn, $sql);
  $sql = "SELECT status from donor_status";
  $result2 = mysqli_query($conn, $sql);
  $row2 = mysqli_fetch_assoc($result2);

  ?>
  <center><h1><u>All Donor Information</u></h1></center>
  <br><br><br><br>
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
          <td><?php echo $row1["D_ID"]."<br>"; ?></td>
          <td><?php echo $row2["status"] . "<br>"; ?></td>
          <td><?php echo $row1["D_Name"]."<br>"; ?></td>
          <td><?php echo $row1["D_Age"]."<br>"; ?></td>
          <td><?php echo $row1["D_Gender"]."<br>"; ?></td>
          <td><?php echo $row1["D_Weight"]."<br>"; ?></td>
          <td><?php echo $row1["D_BloodGroup"]."<br>"; ?></td>
          <td><?php echo $row1["D_Division"]."<br>"; ?></td>
          <td><?php echo $row1["D_Area"]."<br>"; ?></td>
          <td><?php echo $row1["D_Email"]."<br>"; ?></td>
          <td><?php echo $row1["D_Mobile"]."<br>"; ?></td>
        </tr>
    <?php
    }
    ?>
  </table>
</body>