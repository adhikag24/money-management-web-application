<?php 
require_once('connection.php');

class Show extends Connection{
    

    public function showRecord(){
        $sql = "SELECT * FROM money_activity";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0){
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}