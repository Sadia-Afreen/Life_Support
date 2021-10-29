<html>

<head>
  <title>All Blood Requests</title>
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

  $sql = "SELECT * FROM patient";
  $result = mysqli_query($conn, $sql);

  ?>
  <center><h1><u>All Blood Requests</u></h1></center>
  <br><br><br><br>
      <table>
        <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Weight</th>
                    <th>Blood Group</th>
                    <th>Disease</th>
                    <th>Division</th>
                    <th>Area</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
        </tr>
        <?php
    while (($row1 = mysqli_fetch_assoc($result))) {
      ?>
        <tr>
          <td><?php echo $row1["P_Name"]."<br>"; ?></td>
          <td><?php echo $row1["P_Age"]."<br>"; ?></td>
          <td><?php echo $row1["P_Gender"]."<br>"; ?></td>
          <td><?php echo $row1["P_Weight"]."<br>"; ?></td>
          <td><?php echo $row1["P_Bloodgroup"]."<br>"; ?></td>
          <td><?php echo $row1["P_Disease"]."<br>"; ?></td>
          <td><?php echo $row1["P_Division"]."<br>"; ?></td>
          <td><?php echo $row1["P_Area"]."<br>"; ?></td>
          <td><?php echo $row1["P_Email"]."<br>"; ?></td>
          <td><?php echo $row1["P_Mobile_no"]."<br>"; ?></td>
        </tr>
    <?php
    }
    ?>
  </table>
</body>