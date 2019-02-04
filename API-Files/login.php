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

    //gets the email and uses command from users file
    $data = json_decode(file_get_contents("php://input"));
    
    $user->UserName = $data->UserName;
    $emailState = $user->email();
    

    if($emailState && password_verify($data->passwordHash, $user->passwordHash))
    {
        

        http_response_code(200);
        echo json_encode( array("message" => "user found in database"));
        
    }
    // login failed
    else{
        
        // set response code
        http_response_code(401);
        echo json_encode(array("message" => "User not found"));
    }
    ?>
