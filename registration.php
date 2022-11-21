<?php
require 'function.php';

if(isset($_SESSION["id"])){
	header("Location:index.php");
}


$register = new Register();

if(isset($_POST["submit"])){
	$result = $register->registration($_POST["username"], $_POST["email"], $_POST["phone"], $_POST["password"], $_POST["confirmpassword"]);

    if($result == 1) {
    	echo "<script> alert('Registration Successfull'); </script>";
    }

    else if($result==10) {
    	echo "<script> alert('Username Or Email has already been taken'); </script>";
    }

    else if($result==100) {
    	echo "<script> alert('Password does not match'); </script>";
    }

}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<style>
		
form, h2,a{
	margin:20px 0px 0px 20px;
}


	</style>
	<meta charset="utf-8">
	<title>Registration</title>
</head>
<body>
	<h2>Registration</h2>
	<form class="" action="" name="" method="POST">
	<label for="">Username</label><br><br>
	<input type="text" name="username" id="un"><span class="formerror"></span>
	<small></small>
	<br><br>
	<label for="">Email-Id</label><br><br>
    <input type="email" name="email" id="em" ><span class=formerror><br><br>
	<label for="">Phone</label><br><br>
	<input type="phone" name="phone" id="ph"><br><br>
	<label for="">Password</label><br><br>
    <input type="password" name="password" id="pw"><br><br>
	<label for="">Confirm Password</label><br><br>
    <input type="password" name="confirmpassword" id="cpw"><br><br>

    <button type="submit" name="submit" onsubmit="validateform();">Register</button>
</form>
<br><br>

<a href="login.php">Login</a>


</body>
<script>

	function seterror(id,error){
		element = document.getElementById("un").value;
		element.getElementByClassName("formerror").innerHTML=error;

	}





	function validateform(){

var username=document.forms['myform']["username"].value;

if(username == "") {

	seterror("username","please enter username");
	return false;
}
}
</script>
</html>