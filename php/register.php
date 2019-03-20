<?php
session_start();
require('../rmq/testRabbitMQClient.php');

error_reporting(E_ALL);
ini_set('display_errors','1');

$username = $_POST["regusername"];
$password = $_POST["regpassword"];
$response = registration($username, $password);

if ($response != false)
{
        header('location:success.php');
}

else
{
	header('location:../index.php');
}
?>

