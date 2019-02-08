
<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json;charset=UTF-8');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/Users.php';
    
    require __DIR__ . '/vendor/autoload.php';
    use \Firebase\JWT\JWT;

    // gets raw posted data
    
    $data = json_decode(file_get_contents("php://input"));
    
    
    //try catch block for easy token checkup
    try {
        $secret = "onefishtwofish";
        $authentication = JWT::decode($data->token, $secret, array('HS256'));
        http_response_code(200);
        echo json_encode(
                         array(
                               "message" => "login true",
                               "data" => $authentication->data
                               )
                         );
        
    }
    catch(Exception $e)
    {
        http_response_code(401);
        echo json_encode(
                         array(
                               "message" => "fail",
                               "error" => $e->getMessage()
                               
                               )
                         
                         
                         
                         );
    }
    
    
    

