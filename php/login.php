<?php
session_start();
require('../rmq/testRabbitMQClient.php');

error_reporting(E_ALL);
ini_set('display_errors','1');

$username = $_POST["username"];
$password = $_POST["password"];
$response = login($username, $password);

if(isset($_SESSION['user_id'])){
	if ($response != false)
	{
		header('location:success.php');
	}

	else
	{
		header ('location:../index.php');
	}
}
?>

