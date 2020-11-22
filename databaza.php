<?php

class DB{
private $conn;


function connect(){
    try {
        $this->conn = new PDO("mysql:host=localhost;dbname=somfit", "root", "" );
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function getConn():PDO{ //tato funcia vracia :PDO
    return $this->conn;
}

}
?>