<?php
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        
        //Note: Use srv1632.hstgr.io if localtest, and deploy use localhost. 
        $servername = "srv1632.hstgr.io";
        $username = "u143688490_taptek"; // Your database username 
        $password = "Taptek123"; // Your database password
        $dbname = "u143688490_taptek"; // Your database name
        

        /*
        $servername = "localhost";
        $username = "root"; // Your database username 
        $password = ""; // Your database password
        $dbname = "taptek"; // Your database name*/
        
        // Create connection
        $this->connection = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }
}
?>