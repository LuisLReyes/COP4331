<?php
class Contact{
    
    //Connection instance
    private $connection;

    //Table name
    private $table_name = "Contacts";

    //Table columns
    public $idContacts;
    public $FirstName;
    public $LastName;
    public $Address;
    public $PhoneNumber;
    public $Email;
    public $Users_idUsers;

    //Construct with Database
    public function __construct($db){
        $this->connection = $db;
    }
    
    //Create a contact
    public function create(){
        
        // Create query
        $query = 'INSERT INTO ' . 
            $this->table_name . '
            (FirstName, LastName, Address, PhoneNumber, Email, Users_idUsers)
            VALUES 
            (:FirstName, :LastName, :Address, :PhoneNumber, :Email, :Users_idUsers)';
           
        // Prepare statement
        $stmt = $this->connection->prepare($query);

        //Clean data
        $this->Address = htmlspecialchars(strip_tags($this->Address));
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->PhoneNumber = htmlspecialchars(strip_tags($this->PhoneNumber));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Users_idUsers = htmlspecialchars(strip_tags($this->Users_idUsers));
        printf("User ID Being Passed: %s.\n", $this->Users_idUsers);

        //Bind Data
        $stmt->bindParam(':FirstName', $this->FirstName);
        $stmt->bindParam(':LastName', $this->LastName);
        $stmt->bindParam(':Address', $this->Address);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':PhoneNumber', $this->PhoneNumber);
        $stmt->bindParam(':Users_idUsers', $this->Users_idUsers);

        //Execute query
        if($stmt->execute()){
            return true;
        }

        //Print error in case of failure
        printf("Error: %s.\n", $stmt->error);

        return false;

    }
    //Get contacts by user ID
    public function read(){
        $query = 'SELECT 
        * FROM ' . $this->table_name . ' WHERE ' . $this->table_name .  '.Users_idUsers = ?';
        
        // Prepare statement
        $stmt = $this->connection->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->Users_idUsers);

        //Execute query
        $stmt->execute();
        /*
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->Address = $row['Address'];
        $this->FirstName = $row['FirstName'];
        $this->LastName = $row['LastName'];
        $this->Email = $row['Email'];
        $this->PhoneNumber = $row['PhoneNumber'];
        */
        return $stmt;

    }

    public function update(){
        
        // Create query
        $query = 'UPDATE ' . 
            $this->table_name . '
            SET
                FirstName = :FirstName,
                LastName = :LastName,
                Address = :Address,
                PhoneNumber = :PhoneNumber,
                Email = :Email,
                Users_idUsers = :Users_idUsers
            WHERE
                idContacts = :idContacts';
           
        // Prepare statement
        $stmt = $this->connection->prepare($query);

        //Clean data
        $this->Address = htmlspecialchars(strip_tags($this->Address));
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->PhoneNumber = htmlspecialchars(strip_tags($this->PhoneNumber));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Users_idUsers = htmlspecialchars(strip_tags($this->Users_idUsers));
        $this->idContacts = htmlspecialchars(strip_tags($this->idContacts));
        printf("User ID Being Passed: %s.\n", $this->Users_idUsers);

        //Bind Data
        $stmt->bindParam(':FirstName', $this->FirstName);
        $stmt->bindParam(':LastName', $this->LastName);
        $stmt->bindParam(':Address', $this->Address);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':PhoneNumber', $this->PhoneNumber);
        $stmt->bindParam(':Users_idUsers', $this->Users_idUsers);
        $stmt->bindParam(':idContacts', $this->idContacts);

        //Execute query
        if($stmt->execute()){
            return true;
        }

        //Print error in case of failure
        printf("Error: %s.\n", $stmt->error);

        return false;


    }

    public function delete(){
        
    }
}