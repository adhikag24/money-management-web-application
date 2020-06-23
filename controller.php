<?php 
require_once('add.php');

$money = $_POST['money'];
$type = $_POST['type'];

$addDB = new Add($money, $type);
$addDB->addToDB();
