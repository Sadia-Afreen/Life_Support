<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Donor Login</title>
	 <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styleD.css">
	<style>
		.error {
			color: #FF0000;
		}
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
	</style>
</head>

<body>
	<?php
	include 'db_connection.php';
	$conn = OpenCon();

	$errors = 1;
	$usernameErr = $password_1Err = "";
	$username = $password_1 = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["username"])) {
			$usernameErr = "Username is required";
			$errors = 0;
		} else {
			$username = $_POST["username"];
		}


		if (empty($_POST["password_1"])) {
			$password_1Err = "Password is required";
			$errors = 0;
		} else {
			$password_1 = $_POST["password_1"];
			$password = md5($password_1);
		}

		$user_check_query = "SELECT * FROM donor_login WHERE D_Username='$username' AND D_Password='$password'";
		$result = mysqli_query($conn, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		$id = $user["id"];
		$_SESSION["donor_id"] = $id;
		
		if ($user) { // if user exists
			if (($user['D_Username'] == $username) && ($user['D_Password'] == $password)) {
				header('location: after_login.php');
			} else {
				$wrong = "Incorrect username or password";
				?><span class="error">* <?php echo $wrong; ?></span>
	<?php
			}
		}
		else
		{
			$wrong = "Incorrect username or password";
			?><span class="error">* <?php echo $wrong; ?></span>
				<?php	
		}
	}
	?>


<!--html -->
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
                    <div class="boxl">
	<h2 style="text-align: center;color: darkslategrey;font-family:'Playfair Display', serif; padding-right: 20px;">Donor Login</h2>
	<p><span class="error">* required field</span></p>
	<div class="form_l">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		Username: <input type="text" name="username" value="<?php echo $username; ?>">
		<span class="error">* <?php echo $usernameErr; ?></span>
		<br><br>
		Password: <input type="password" name="password_1">
		<span class="error">* <?php echo $password_1Err; ?></span>
		<br><br>
		<input type="submit" name="submit" value="Login">
		<p>
			Not yet a member? <a href="Donor_reg.php">Sign up</a>
		</p>
	</form>
</div>
</div>
	</div>
</div>
</body>
</html>