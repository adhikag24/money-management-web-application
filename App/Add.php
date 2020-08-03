<?php 
require_once('connection.php');

class Add extends Connection{    
    public $money;
    public $type;
    public $usersId;

    function __construct($money, $type, $usersId){
        $this->money = $money;
        $this->type = $type;
        $this->usersId = $usersId;
    }

    function print_data(){
        echo $this->money;
        echo $this->type;
        echo $this->usersId;
    }
    // money, type, users_id
    public function addToDB(){
        $insertDB = mysqli_query($this->connect(),"INSERT INTO money_activity (money, type, usersId) VALUES ('$this->money', '$this->type', '$this->usersId')");

        if($insertDB){
            header('location:index.php');
        }
        else{
            echo "something wrong happen";
        }
    }

}