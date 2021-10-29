<?php session_start() ?>
<html>
    <head>
    </head>
    <body>
        <?php
            include 'db_connection.php';
            $conn = OpenCon();
            $id = $_SESSION["donor_id"];
            $sql = "DELETE FROM donor WHERE D_ID = '$id'";
            if ($conn->query($sql)) {
                header("Location:Donor_logout.php");
            }
        ?>
    </body>
</html>