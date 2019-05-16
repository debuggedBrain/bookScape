#!/usr/bin/php
<?php

 	require_once('path.inc');
        require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');

//Gets machine name then strts the function
$machine = exec('../getPack.sh');
echo "The machine is: ".$machine."\n";
prodPack($machine);

function prodPack($machine)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
                
	$request= array();
        $request['type'] = "getProd";
        $request['machine'] = $machine;
        
	$file = $client->send_request($request);
	$version = substr($file,-5,1);

        echo "Version number is: ".$version."\n";
	echo "The filename is: ".$file."\n";
	sendPack($machine,$file,$version);
}

function sendPack($machine,$file,$version)
{
	echo"Doing the send now-----------:0\n";
	shell_exec("../sendPack.sh $machine $file");
	updateDB($machine,$file,$version);
	
}

function updateDB($machine,$file,$version)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

        $request= array();
        $request['type'] = "update_sent";
        $request['lvl']  = 'Prod';
	$request['machine'] = $machine;
	$request['version']  = $version;
	$request['status']  = "good";
	$request['filename'] = $file;

        $response = $client->send_request($request);
	exit();
}

?>
