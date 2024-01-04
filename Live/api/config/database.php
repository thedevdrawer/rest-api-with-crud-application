<?php
//$mysqli = new mysqli("localhost", "root", "", "livetest", "3308");

class Database {
    private $host = "localhost";
    private $database_name = "livetest";
    private $username = "root";
    private $password = "";
    private $port = "3308";

    public $conn;

    public function getConnection(){
       $this->conn = null;
        try{
            $this->conn = new PDO(
            	"mysql:host=" . $this->host . ";
            	port=" . $this->port . ";
            	dbname=" . $this->database_name,
            	$this->username,
            	$this->password
            );
        }catch(PDOException $exception){
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>