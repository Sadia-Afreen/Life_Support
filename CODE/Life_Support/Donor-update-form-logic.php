<?php session_start(); ?>
<?php include 'db_connection.php'; ?>


<?php
$id = $_SESSION["donor_id"];
if (count($_POST) > 0) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $bloodgroup = $_POST['bloodgroup'];
    $division = $_POST['division'];
    $area = $_POST['area'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_1 = md5($password);
    $hospital = $_POST['hospital'];
    $lastdon = $_POST['lastdon'];
    $smoker = $_POST['smoker'];
    $aids = $_POST['aids'];
    $allergy = $_POST['allergy'];
    $bloodpressure = $_POST['bloodpressure'];
    
    

  //  echo "$name <br> $gender <br> $division <br> $area <br> $email <br> $username <br> $password <br> $id<br>";

    $conn = OpenCon();
   
    $sql = "UPDATE donor SET D_Name ='$name', D_Age ='$age', D_Email ='$email', D_Weight ='$weight', D_BloodGroup ='$bloodgroup',D_Mobile='$mobile', D_Division ='$division', D_Area ='$area', D_Gender ='$gender' WHERE D_ID='$id'";

    $sql1 = "UPDATE donor_login SET D_Username ='$username', D_Password ='$password_1', D_Email ='$email' WHERE id='$id'";

    $sql2 = "UPDATE donation_history SET Hospital_name ='$hospital', Date ='$lastdon' WHERE donation_id='$id'";

    $sql3 = "UPDATE donor_medical_history SET smoker ='$smoker', aids ='$aids', allergy ='$allergy', blood_pressure ='$bloodpressure' WHERE donor_id='$id'";

    if(($conn->query($sql)) && ($conn->query($sql1)) && ($conn->query($sql2)) && ($conn->query($sql3))){
        header("Location:Donor_view.php");
    }
}
?>