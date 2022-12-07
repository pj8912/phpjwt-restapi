<?php

use JwtRest\Database\Database;
use JwtRest\Models\Authentication;





header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$flname = '';
$email = '';
$pwd = '';
$conn = null;

$database = new Database();
$conn = $database->conn();

$data = json_decode(file_get_contents("php://input"));
$flname = $data->flname;
$email = $data->email;
$pwd = $data->pwd;

$table = 'users';

$sql = "INSERT INTO {$}"
