
<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, 
    Access-Control-Allow-Methods, Authorization, X-Requested-With');
    include_once '../../config/Database.php';
    include_once '../../models/Users.php';
    
    require __DIR__ . '/vendor/autoload.php';
    use \Firebase\JWT\JWT;

    // Instantiate DB & connect
    
    $database = new database();
    $db = $database->connect();
    // Instantiate user
    $user = new Users($db);
    
    //gets raw posted data
    $data = json_decode(file_get_contents("php://input"));
    
    $user->UserName = $data->UserName;
    $emailState = $user->email();
    
    
    if($emailState && password_verify($data->passwordHash, $user->passwordHash))
    {
        $secret = "onefishtwofish";
        $issue = array(
                       "iss" => 'http://www.arkto.xyz/', //issuer
                       "exp" => time() + 3600,    //time to expire
                       "data"=>array(
                                     "idUsers" => $user->idUsers,
                                     "FirstName" => $user->FirstName,
                                     "LastName" => $user->LastName,
                                     "UserName" => $user->UserName
                                     
                                     )//2d array component that holds data for us
                       
                       
                       
                       );
        $token = JWT::encode($issue,$secret);//make the token
        echo json_encode( array("message" => "login true","token"=>$token));
        
        
    }
    // login failed
    else{
        
        // set response code
        http_response_code(401);
        echo json_encode(array("message" => "login failed"));
    }
    ?>