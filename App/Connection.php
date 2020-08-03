<?php

class Connection{
public $servername;
public $username;
public $password;
public $dbname;

// Create connection
    public function connect(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "money_management_app";

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        else{
            return $conn;
        }
       
    }
}