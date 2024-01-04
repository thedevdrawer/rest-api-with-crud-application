<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once $_SERVER['DOCUMENT_ROOT'].'/api/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/api/controllers/pages.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Pages($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->orderid = $data->orderid;
    $item->slug = $data->slug;
    $item->title = $data->title;
    $item->content = $data->content;
    
    if($item->create()):
        http_response_code(200);
        echo json_encode(
            array(
                "type" => "success",
                "title" => "Success",
                "message" => "The page was created successfully."
            )
        );
    else:
        http_response_code(400);
        echo json_encode(
            array(
                "type" => "danger",
                "title" => "Failed",
                "message" => "The page was not created successfully. Please try again."
            )
        );
    endif;
?>