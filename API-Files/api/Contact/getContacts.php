<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../Config/Database.php';
    include_once '../../Models/Contact.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate contact
    $contact = new Contact($db);

    // Get ID from URL
    $contact->Users_idUsers = isset($_GET['Users_idUsers']) ? $_GET['Users_idUsers'] : die();

    // Get contact
    $result = $contact->read();
    // Get row count
    $num = $result->rowCount();

    //Check for Contacts

    if($num > 0){
        //Create array
        $contact_arr = array();
        $contact_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $contact_item = array(
                'FirstName' => $FirstName,
                'LastName' => $LastName,
                'Address' => $Address,
                'PhoneNumber' => $PhoneNumber,
                'Email' => $Email,
                'idContacts' => $idContacts,
                'Users_idUsers' => $Users_idUsers
            );

            //push to data array
            array_push($contact_arr['data'], $contact_item);
        }
    //Make JSON and return
    print_r(json_encode($contact_arr));

    }
    else{
        //No contacts
        echo json_encode(
            array('message' => 'No Contacts Found')
        );
    }
    

    