<?php
session_start();

class Connection{

	public $host = "localhost";
	public $user = "root";
	public $password = "";
	public $dbname = "signup";
	public $conn;


   public function __construct() {
   	$this->conn = mysqli_connect($this->host, $this->user, $this->password,$this->dbname);
   }
}
    
 
class Register extends Connection{

	public function registration($username, $email, $phone, $password, $confirmpassword) {
		$duplicate = mysqli_query($this->conn,"SELECT * FROM registration WHERE username = '$username' OR email = '$email'");
		if(mysqli_num_rows($duplicate)>0){
			return 10;
		}
		else {
			if($password == $confirmpassword){
				$query = "INSERT INTO registration VALUES('','$username','$email','$phone','$password','$confirmpassword')";
				mysqli_query($this->conn,$query);
				return 1;

			}
			else {
				return 100;
			}
		}

	}
}

class Login extends Connection {
	public $id;
	public function login($usernameemail, $password){
		$result = mysqli_query($this->conn, "SELECT * FROM registration where username = '$usernameemail' OR email = '$usernameemail'");
		$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result)>0){
			if($password == $row["password"]) {
				$this->id = $row["id"];
				return 1;
			}
			else {
				return 10;
			}

		}
		else{
			return 100;
		}
	}
	public function idUser() {
		return $this->id;
	}
}



class Select extends Connection
{
	
	public function selectUserById($id)
	{

		$result = mysqli_query($this->conn, "SELECT * FROM registration WHERE id = $id");
		return mysqli_fetch_assoc($result);
	}
}