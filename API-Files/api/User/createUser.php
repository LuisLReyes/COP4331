<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, 
    Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Users.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate user
    $user = new Users($db);

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
