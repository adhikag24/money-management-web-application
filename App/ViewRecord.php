<?php

require_once('Show.php');

class ViewRecord extends Show{
    
    public function showAllRecord(){
        $datas = $this->showRecord();
        return $datas;
        //return $datas;
    }

}