<?php 
require_once('Connection.php');
require_once('Add.php');
require_once('Delete.php');

if (isset($_POST['submit'])){
    $money = $_POST['money'];
    $type = $_POST['type'];
    $usersId = $_POST['usersId'];

    var_dump($money);
    var_dump($type);
    var_dump($usersId);

    
    $addDB = new Add($money, $type, $usersId);
    // $addDB->print_data();
    $addDB->addToDB();
}

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $deleteDB = new Delete($id);
    $deleteDB->DeleteRecord();
}

