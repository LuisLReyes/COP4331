<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
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

    $contact->FirstName = $data->FirstName;
    $contact->LastName = $data->LastName;
    $contact->Email = $data->Email;
    $contact->PhoneNumber = $data->PhoneNumber;
    $contact->Address = $data->Address;
    $contact->Users_idUsers = $data->Users_idUsers;

    // Update contact
    if($contact->update()){
        echo json_encode(
            array('message' => 'Contact Updated')
        );
    }
    else {
        echo json_encode(
            array('message' => 'Contact Not Updated')
        );
    }