#!/usr/bin/php
<?php
//serverFile
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('login.php.inc');

function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    $login = new loginDB();
    return $login->validateLogin($username,$password);
    //return false if not valid
}

function doRegister($username,$password)
{
	$register = new loginDB();
	return $register->validateRegister($username,$password);
}

function doSchedule($courseInfo)
{
	$schedule = new loginDB();
	return $schedule->validateSchedule($courseInfo);
}


function doSeller($bookInfo)
{
	$bookSell = new loginDB();
	return $bookSell->validateSell($bookInfo);
}


function requestProcessor($request)
{
  echo "NEW: received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
	return doLogin($request['username'],$request['password']);
    case "register":
	return doRegister($request['username'],$request['password']);
    case "schedule":
	return doSchedule($request);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

