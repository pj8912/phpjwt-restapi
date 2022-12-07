<?php

namespace JwtRest;

require '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;



class Handle{

	protected $secret, $token, $created_at, $expire, $jwt;

	public function __construct(){
		$this->created_at = time();
		$this->expire = $this->created_at + 3600;
		$this->secret = "new_secret";

	}

	public function encodedData($is, $data){
		$this->token = [
			"iss"=>$is,
			"aud"=>$is,
			"iat"=>$this->created_at,
			"exp" => $this->expire,
			"data" => $data
		];
		$this->jwt =JWT::encode($this->token, $this->secret, 'HS256');
		return $this->jwt;
	}

	public function decodedData($t){
		try{
			$decode = JWT::decode($t,  new Key($this->secret,'HS256'));
			return $decode->data;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public static function test(){
		return "handle working";
	}

}
