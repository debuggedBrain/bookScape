<?php
//initialFile
session_start();
require('../rmq/testRabbitMQClient.php');
error_reporting(E_ALL);
ini_set('display_errors','1');
$user = $_POST["user"];
$bookInfo = array();//array holding course info
$bookInfo['title'] = $_POST["title"];
$bookInfo['ISBN'] = $_POST["ISBN"];
$bookInfo['price'] = $_POST["price"];

$response = sellBooks($courseInfo,$user);
if ($response != false)
{
        header('location:success.php');
}
else
{
        header('location:../index.php');
}
?>
