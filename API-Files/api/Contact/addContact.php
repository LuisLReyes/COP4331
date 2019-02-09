<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json;charset=UTF-8');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Max-Age: 3600');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
    

    include_once '../../Config/Database.php';
    include_once '../../Models/Contact.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate contact
    $contact = new Contact($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $contact->FirstName = $data->FirstName;
    $contact->LastName = $data->LastName;
    $contact->Email = $data->Email;
    $contact->PhoneNumber = $data->PhoneNumber;
    $contact->Address = $data->Address;
    $contact->Users_idUsers = $data->Users_idUsers;

    // Create user
    if($contact->create()){
        echo json_encode(
            array('message' => 'Contact Created')
        );
    }
    else {
        echo json_encode(
            array('message' => 'Contact Not Created')
        );
    }
