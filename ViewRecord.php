<?php

require_once('Show.php');

class ViewRecord extends Show{
    
    public function showAllRecord(){
        $datas = $this->showRecord();
        foreach ($datas as $data){
            echo $data['money'];
            echo $data['type'];
            echo $data['date'];
        }
    }

}