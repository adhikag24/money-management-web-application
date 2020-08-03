<?php 
require_once('connection.php');

class Show extends Connection{
    
    public $usersId;

    function __construct($usersId){
        $this->usersId = $usersId;
    }

    public function showRecord(){
        $sql = "SELECT * FROM money_activity WHERE usersId = $this->usersId";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0){
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function showAllRecord(){
        $datas = $this->showRecord();
        return $datas;
        //return $datas;
    }
}