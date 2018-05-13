<?php

class DatabaseConnection {
    private $host = 'localhost';
    private $username = 'admin';
    private $password = '';
    private $dbName = 'slimapp';
    

    public function connect() {
        $mysql_connect_str = "mysql:host=$this->host;dbname=$this->dbName;";
        $dbConnection = new PDO($mysql_connect_str, $this->username, $this->password);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
}

?>