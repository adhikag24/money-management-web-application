<?php 
require_once('connection.php');

class Add extends Connection{    
    public $money;
    public $type;

    function __construct($money, $type){
        $this->money = $money;
        $this->type = $type;
    }

    // money, type
    public function addToDB(){
        $insertDB = mysqli_query($this->connect(),"INSERT INTO money_activity (money, type) VALUES ('$this->money', '$this->type')");

        if($insertDB){
            echo "record updated";
        }
        else{
            echo "something wrong happen";
        }
    }
}