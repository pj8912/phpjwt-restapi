<?php

namespace JwtRest\Database;

class Database{

	private $conn;
	private $host = 'localhost';
	private $uname = 'root';
	private $pwd = '';
	private $dbname = 'jwt-rest';

	public function connect(){
		try{
			
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->uname, $this->pwd);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}
		catch(PDOException $e){
			echo "DB_ERR:".$e->getMessage();
		}
		return $this->conn;
	}


	public static function test(){
		return 'db working';

	
	}

}

