<?php

    class Database{

        //Database Parameters 
        private $host = 'instance1.cmypksuf5hak.us-east-1.rds.amazonaws.com';
        private $db_name = 'FinalDB';
        private $username = 'username';
        private $password = 'password';
        private $conn;

        //Database Connection
        public function connect(){
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                echo 'Connection Error: ' . $e->getMessage();
            }

            return $this->conn;
        }
    }


//Old code below for sloppy addition of users

/*

    $connection = new mysqli("instance1.cmypksuf5hak.us-east-1.rds.amazonaws.com", "username", "password", "MainDB");

    if ($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }
    echo "Connect successfully <br>";

    $sql = "Insert Into Users (FirstName, LastName, UserName) VALUES ('Luis', 'Reyes', 'kumamishima')";

    if($connection->query($sql) === TRUE){
        echo "You should now be added into the DB";
    }
    else{
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
    $sql = "SELECT FirstName, LastName, UserName FROM Users";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "First Name: " . $row["FirstName"]. " <br>Last Name: " . $row["LastName"]. " <br>Username: " . $row["UserName"]. "<br>";
        }
    } 
    else {
        echo "0 results";
    }
$connection->close();
*/
?>
