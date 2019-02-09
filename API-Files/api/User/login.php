


   <?php
    // Headers

    header('Content-Type: application/json;charset=UTF-8');
   
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
    require __DIR__ . '/vendor/autoload.php';
    //for json tokens
    
  //  include_once 'config/Database.php';
    //include_once 'models/Users.php';
    use \Firebase\JWT\JWT;
    include_once '../../Config/Database.php';
    include_once '../../Models/Users.php';
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
       // http_response_code(401);
       // var_dump(http_response_code());
        header('http/1.0 403 not found');
        var_dump(http_response_code());
        echo json_encode(array("message" => "login failed"));
    }
    ?>
