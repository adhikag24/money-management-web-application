<?php

class Connection{
public $servername = "localhost";
public $username = "root";
public $password = "";
public $dbname = "money_management_app";


// Create connection
    protected function connect(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
    }
}