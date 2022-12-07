<?php

use JwtRest\Database\Database;
use JwtRest\Models\Authentication;


header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//database
$database = new Database();
$db = $database->conn();

//auth
$auth =  new Authentication($db);


//get input data
$data = json_decode(file_get_contents("php://input"));




$auth->flname = $data->flname; //fullname
$auth->email = $data->email; //email



$result = $auth->check_user();
$num = $result->rowCount();

if($num > 0){
	echo json_encode([

                "message" => "User already exists!"
        ]);
}
else{
	$hashedPwd = password_hash($data->pwd, PASSWORD_DEFAULT);
	$auth->pwd = $hashedPwd; //hashed password
	
	if($auth->createUser()){
	
		http_response_code(200);
        	echo json_encode([
			"message" => "Account created!"
		
		]);
	
	}
	
	else{
		http_resonse_code(400);
		echo json_encode([
                	"message" => "Account Creation Failed"
        	]);
	}
}

