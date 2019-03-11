#!/usr/bin/php
<?php
$host = "127.0.0.1";
$user = 'marco';
$password = 'Snakefist0.';
$db = 'Account';
$mysqli = new mysqli($host, $user, $password, $db);
if($mysqli->connect_errno){
	printf("Connection failed: %s \n", $mysqli->connect_error);
	die();
}
?>
