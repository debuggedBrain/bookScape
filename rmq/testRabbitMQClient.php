#!/usr/bin/php
<?php
//clientFile
session_start();
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

error_reporting(E_ALL);
ini_set('display_errors','1');

function login ($username, $password)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "login";
	$request['username'] = $username;
	$request['password'] = $password;
	$_SESSION['user_id'] = $username;
	//$request['message'] = "HI";
	$response = $client->send_request($request);
	//$response = $client->publish($request);

	echo "Client response received (login): ".PHP_EOL; 

	return $response;
} //end of login funtion


function registration ($username, $password)
{
	$register = array();
	$register['type'] = "register";
	$register['username'] = $username;
	$register['password'] = $password;
	//$register['message'] = "some message";

	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$response = $client->send_request($register);

	echo "Client response received (register): ".PHP_EOL;

	return $response;
}

function buildSchedule ($courseInfo,$user)
{
	$courseInfo['type'] = "schedule";
	$courseInfo['user'] = $user;
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$response = $client->send_request($courseInfo);

	echo "Client response received (buildSchedule): ".PHP_EOL;
	return $response;
}

function sellBooks ($bookInfo,$user)
{
	$bookInfo['type'] = "schedule";
	$bookInfo['user'] = $user;
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$response = $client->send_request(bookInfo);

	echo "Client response received (sellBooks): ".PHP_EOL;
	return $response;
}

?>

