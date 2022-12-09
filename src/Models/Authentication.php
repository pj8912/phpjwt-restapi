<?php


namespace JwtRest\Models;

class Authentication{
	private $conn;
	public function __construct($db){
		$this->conn = $db;
	}
	private $table = "users";

	public $flname, $email, $pwd;

	public function createUser(){
		$sql = "INSERT INTO {$this->table}(user_fullname,user_email,user_pwd,created_at) VALUES(:user_fullname, :user_email, :user_pwd, NOW())";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":user_fullname", $this->flname);
		$stmt->bindParam(":user_email", $this->email);
		$stmt->bindParam(":user_pwd", $this->pwd);
		if($stmt->execute()){
			return true;
		}
		return false;

	}


	public function check_user()
	{
		$sql = "SELECT user_id, user_fullname, user_email FROM {$this->table} WHERE user_email = :user_email";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_email', $this->email);
		if($stmt->execute()){
			return $stmt;
		}
		return false;
	}
	
	public static function test(){
		return "auth working";
	}



}
