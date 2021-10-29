<?php session_start() ?>
<html>
    <head></head>
    <body>
<?php
          include 'db_connection.php';
          $conn = OpenCon();
          $id = $_SESSION["donor_id"];
          //echo "$id <br>";
          $sql = "SELECT Date from donation_history where donation_id='$id'";
          $result = mysqli_query($conn, $sql);
          $row1 = mysqli_fetch_assoc($result);
          $name = $row1['Date'];

$now = time(); // or your date as well
$your_date = strtotime("$name");
$datediff = $now - $your_date;

$duration = round($datediff / (60 * 60 * 24));
if($duration>120)
{
    echo "CONGRATULATIONS! You can donate now.";
}
else
{
    echo "You have ".(120-$duration)." days left to donate.";
}
?>
    </body>
</html>