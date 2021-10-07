<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once dirname(__DIR__).'/class/database.php';
    include_once dirname(__DIR__).'/class/user.php';


    $database = new Database();
    $db = $database->getConnection();

    $users = new User($db);

    $stmt = $users->getAll();
    $counts = $stmt->rowCount();


    if($counts >= 1){
        
        $dataArr = array();
        $dataArr["data"] = array();
        $dataArr["message"] = "success";
        $dataArr["counts"] = $counts;
        

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "age" => $age,
                "designation" => $designation,
                "created" => $created
            );

            array_push($dataArr["data"], $e);
        }
        echo json_encode($dataArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "fail")
        );
    }