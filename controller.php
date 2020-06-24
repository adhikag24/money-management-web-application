<?php 
require_once('Connection.php');
require_once('Add.php');
require_once('Delete.php');

if (isset($_POST['submit'])){
    $money = $_POST['money'];
    $type = $_POST['type'];

    $addDB = new Add($money, $type);
    $addDB->addToDB();
}

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $deleteDB = new Delete($id);
    $deleteDB->DeleteRecord();
}