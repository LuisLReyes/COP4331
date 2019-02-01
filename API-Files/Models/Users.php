<?php
class Users{
    
    //Connection instance
    private $connection;

    //Table name
    private $table_name = "Users";

    //Table columns
    public $FirstName;
    public $LastName;
    public $UserName;
    public $idUsers;

    //Construct with Database
    public function __construct($db){
        $this->connection = $db;
    }
    
    //Create a user
    public function create(){
        // Create query
        $query = 'INSERT INTO ' . 
            $this->table_name . '
            SET
                FirstName = :FirstName,
                LastName = :LastName,
                UserName = :UserName';
        
        // Prepare statement
        $stmt = $this->connection->prepare($query);

        //Clean data
        $this->UserName = htmlspecialchars(strip_tags($this->UserName));
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));

        //Bind Data
        $stmt->bindParam(':FirstName', $this->FirstName);
        $stmt->bindParam(':LastName', $this->LastName);
        $stmt->bindParam(':UserName', $this->UserName);

        //Execute query
        if($stmt->execute()){
            return true;
        }

        //Print error in case of failure
        printf("Error: %s.\n", $stmt->error);

        return false;

    }
    //Get user by ID
    public function read(){
        $query = 'SELECT 
        * FROM ' . $this->table_name . ' WHERE ' . $this->table_name .  '.idUsers = ? LIMIT 0,1';
        
        // Prepare statement
        $stmt = $this->connection->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->idUsers);

        //Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->idUsers = $row['idUsers'];
        $this->FirstName = $row['FirstName'];
        $this->LastName = $row['LastName'];
        $this->UserName = $row['UserName'];
        return $stmt;

    }

    public function update(){

    }

    public function delete(){
        
    }
}