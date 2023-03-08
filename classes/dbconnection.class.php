<?php

class DbConnection  {
    public $conn;
    public $dbHost = 'localhost';
    public $dbUser = 'root';
    public $dbPassword = '';
    public $dbName = 'web_store';

    function __construct() {
        $this->conn = new mysqli ($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);

        if($this->conn->connect_error){
            die('Error while trying to connect with database');
        }
    }
}

?>