<?php
class Users{
    
    //Connection instance
    private $connection;
    //Table name
    private $table_name = "Users";
    //Table columns
     public $idUsers;
    public $FirstName;
    public $LastName;
    public $UserName;
    public $passwordHash;
    
    //Construct with Database
    public function __construct($db){
        $this->connection = $db;
    }
    
    //Create a user
     function create(){
        // Create query
        $query = "INSERT INTO " . $this->table_name . "
            SET
                FirstName = :FirstName,
                LastName = :LastName,
                UserName = :UserName,
                passwordHash = :passwordHash";
        
        // Prepare statement
        $stmt = $this->connection->prepare($query);
        //Clean data
        $this->UserName = htmlspecialchars(strip_tags($this->UserName));
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->passwordHash = htmlspecialchars(strip_tags($this->passwordHash));
        //Bind Data
        $stmt->bindParam(':FirstName', $this->FirstName);
        $stmt->bindParam(':LastName', $this->LastName);
        $stmt->bindParam(':UserName', $this->UserName);
         
         // hash the password before saving to database
         $password_hash = password_hash($this->passwordHash, PASSWORD_DEFAULT);
         $stmt->bindParam(':passwordHash', $password_hash);
         
         
        //Execute query
        if($stmt->execute()){
            return true;
        }
       
        
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
    function email(){
        
        // lookup query
        $query = "SELECT idUsers, FirstName, LastName, passwordHash
        FROM " . $this->table_name . "
        WHERE UserName = ?
        LIMIT 0,1";
        
        //prepare statements
        $stmt = $this->connection->prepare($query);
        $this->UserName=htmlspecialchars(strip_tags($this->UserName));
        //bind id
        $stmt->bindParam(1, $this->UserName);
        //execute query
        $stmt->execute();
        
        $num = $stmt->rowCount();
   
        
        //check to see if the email does in fact have a value associated to it
        if($num>0){
            
            // gets the values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // assign
            $this->idUsers = $row['idUsers'];
            $this->FirstName = $row['FirstName'];
            $this->LastName = $row['LastName'];
            $this->passwordHash = $row['passwordHash'];
            
            return true;
        }
        
        // return false if email does not have any rows to it
        return false;
        
        
        
    }
}
