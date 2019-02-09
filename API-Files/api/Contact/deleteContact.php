<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, 
    Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../Config/Database.php';
    include_once '../../Models/Contact.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate contact
    $contact = new Contact($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to update
    $contact->idContacts = $data->idContacts;

    // Delete contact
    if($contact->delete()){
        echo json_encode(
            array('message' => 'Contact Deleted')
        );
    }
    else {
        echo json_encode(
            array('message' => 'Contact Not Deleted')
        );
    }