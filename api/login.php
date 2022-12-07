<?php

use JwtRest\Database\Database;
use JwtRest\Models\Authentication;

require '../vendor/autoload.php';

use JwtRest\Handle;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



//database
$database = new Database();
$db = $database->conn();

//auth
$auth = new Authentication($db);


//get input data
$data = json_decode(file_get_contents("php://input"));


$auth->email = $data->email;
$auth->pwd = $data->pwd;

$email = $data->email;


$result = $auth->check_user();
$num = $result->rowCount();
if($num > 0){

	$row = $result->fetch(PDO::FETCH_ASSOC);

	$id = $row['user_id'];
	$flname = $row['user_fullname'];
	
	$hashedPwd = $row['user_pwd'];      
	$hashedPwdCheck = password_verify($pwd, $hashedPwd);
       
	if ($hashedPwdCheck == false) {

		 http_response_code(401);
		 echo json_encode(["message" => "Wrong Password"]);
	 
	 } 
	 else{		 
	
		 $user_data = [
		 	'uid' => $id,
			'flname'=>$flname,
			'email' => $email
		 ];

		 http_response_code(200);

	 
		 $handle  = new Handle();
		 $token = $handle->encodedData('http://localhost/PHPJWT-RESTAPI-AUTH', $user_data);

		 echo json_encode(

			 [
				 "message" => "Logged In",
				 "jwt" =>$token,
				 "email" => $email,
				 "expire_at" => $handle->expire
			 
			 ]
		 );
	 
	 }
}
else{
	http_response_code(401);
	echo json_encode(["message" => "login failed"]);
}

?>

