<?php
require_once('Connection.php');

class Delete extends Connection{
    public $id;

    function __construct($id){
        $this->id = $id;
    }

    public function DeleteRecord(){
        $sql = "DELETE FROM money_activity WHERE id =$this->id";

        if ($this->connect()->query($sql) === TRUE) {
            header('location:index.php');
          } else {
            echo "Error deleting record: " . $this->connect()->error;
          }
    }
}