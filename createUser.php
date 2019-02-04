<?php
    // Headers
    header('Access-Control-Allow-Origin: http://localhost/rest/');
    header('Content-Type: application/json;charset=UTF-8');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
           
    include_once 'config/database.php';
    include_once 'objects/user.php';
    // Instantiate DB & connect
    $database = new database();
    $db = $database->connect();
    // Instantiate user
    $user = new user($db);
    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    $user->FirstName = $data->FirstName;
    $user->LastName = $data->LastName;
    $user->UserName = $data->UserName;
    $user->passwordHash = $data->passwordHash;
    // Create user
    if($user->create()){
            http_response_code(200);
        echo json_encode(array('message' => 'User Created')
        );
    }
    else {
        http_response_code(400);
        echo json_encode(array('message' => 'User Not Created')
        );
    }
