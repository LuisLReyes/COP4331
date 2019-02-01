<!--hasty script put together to quickly check the contents of the Users table-->
<!--just open this on the apache server and it will display all Users-->

<?php
    $conn = new mysqli("instance1.cmypksuf5hak.us-east-1.rds.amazonaws.com", "username", "password", "MainDB");

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connect successfully <br>";

    $sql = "SELECT FirstName, LastName, UserName, idUsers FROM Users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "First Name: " . $row["FirstName"]. " Last Name: " . $row["LastName"]. " Username: " . $row["UserName"]. " userID: " . $row["idUsers"]."<br>";
        }
    } 
    else {
        echo "0 results";
    }
$conn->close();

?>
