<?php
    // Headers
      header('Access-Control-Allow-Origin: *');
     header('Content-Type: application/json;charset=UTF-8');
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
           

    include_once '../../Config/Database.php';
    include_once '../../Models/Users.php';

 
   require __DIR__ . '/vendor/autoload.php';
     use \Firebase\JWT\JWT;
    // Instantiate DB & connect
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
    $emailState = $user->email();
    // Create user
    if($emailState)
    {
        http_response_code(400);
        echo json_encode(array('message' => 'User already in file')
                         );
    }
   else if($user->create()){
        http_response_code(200);
        echo json_encode(array('message' => 'User Created')
                         );
    }
    else {
        http_response_code(400);
        echo json_encode(array('message' => 'User Not Created')
                         );
    }
