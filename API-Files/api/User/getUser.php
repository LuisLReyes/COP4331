<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../Config/Database.php';
    include_once '../../Models/Users.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate user
    $user = new Users($db);

    // Get ID from URL
    $user->idUsers = isset($_GET['idUsers']) ? $_GET['idUsers'] : die();

    // Get User
    $user->read();

    //Create array
    $user_arr = array(
        'idUsers' => $user->idUsers,
        'FirstName' => $user->FirstName,
        'LastName' => $user->LastName,
        'UserName' => $user->UserName
    );

    //Make JSON
    print_r(json_encode($user_arr));

    //Older code below, might be relevant to look at later

    /*
    //Query
    $result = $user->read();
    // Get row count
    $num = $result->rowCount();

    //Chech if any user comes up
    if($num > 0) {
        //
        $users_arr = array();
        $users_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract ($row);
            
            $user_item = array(
                'idUsers' => $ID,
                'FirstName' => $Firstname,
                'LastName' => $LastName,
                'UserName' => $UserName 
            );

            //Push to 'data'
            array_push($users_arr['data'], $user_item);


            //Turn to JSON & output
            echo json_encode($users_arr);
        }
    }
    else{
        //No users
        echo json_encode(
            array('message' => 'No users found')
        );

    }
    */