<?php
session_start();
require('../rmq/testRabbitMQClient.php');

error_reporting(E_ALL);
ini_set('display_errors','1');

$course1 = $_POST["course1"];
$time1 = $_POST["time1"];
$response = ($course1, $time1);

if ($response != false)
{
        header('location:success.php');
}

else
{
        header('location:../index.php');
}
?>

