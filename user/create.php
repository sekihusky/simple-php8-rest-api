<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once dirname(__DIR__).'/class/database.php';
    include_once dirname(__DIR__).'/class/user.php';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $data = json_decode(file_get_contents("php://input"));

    $user->name = $data->name;
    $user->email = $data->email;
    $user->age = $data->age;
    $user->designation = $data->designation;
    $user->created = date('Y-m-d H:i:s');
    
    if($user->create()){
        echo json_encode(
            array("message" => "success")
        );
    } else{
        echo json_encode(
            array("message" => "fail")
        );
    }