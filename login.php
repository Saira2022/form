<?php
require 'function.php';

if(isset($_SESSION["id"])){
	header("Location:index.php");
}



$login = new Login();

if(isset($_POST["submit"])){
	$result = $login->login($_POST["usernameemail"],$_POST["password"]);

	if($result == 1) {
		$_SESSION["login"] = true;
		$_SESSION["id"] = $login->idUser();
		header("Location:index.php");


	}
	elseif ($result ==10) {
		echo "<script> alert('Wrong Password'); </script>";
	}
	elseif ($result ==100){
		echo "<script> alert('User Not Registered'); </script>";
	}
}



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<style>
		.reg{
			background-color: lightgreen;
			color: black;
		}
<meta charset="utf-8">
	<title>Login</title>
	</style>
</head>

<body>
	<h2>Login</h2>
	<form class="" action="" method="POST">
		<label for="">Username or Email</label><br><br>
		<input type="text" name="usernameemail" required value=""><br><br>
		<label for="">Password</label><br><br>
		<input type="password" name="password" required value=""><br><br>

		<button type="submit" name="submit">Login</button>
	</form>
	<br><br>
	<button type="submit" class="reg"><a href="registration.php">Registration</a></button>
</body>


</html>