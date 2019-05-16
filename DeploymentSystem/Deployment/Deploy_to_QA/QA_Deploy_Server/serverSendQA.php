#!/usr/bin/php
<?php
 	require_once('path.inc');
        require_once('get_host_info.inc');
        require_once('rabbitMQLib.inc');

$machine = exec('../getPack.sh');
echo "The machine is: ".$machine."\n";
getFile($machine);

function getFile($machine)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
                
	$request= array();
        $request['type'] = "getFile";
        $request['machine'] = $machine;
        
	$file = $client->send_request($request);
	$version = substr($file,-5,1);

        echo "Version number is: ".$version."\n";
	echo "Name of file is: ".$file."\n";
	sendFile($machine,$file,$version);
}

function sendFile($machine,$file,$version)
{
	echo"Doing the send--------:0\n";
	shell_exec("../sendPack.sh $machine $file");
	doUpdate($machine,$file,$version);
	
}

function doUpdate($machine,$file,$version)
{
	//updating status table here
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

        $request= array();
        $request['type'] = "update_sent";
        $request['lvl']  = 'QA';
	$request['machine'] = $machine;
	$request['version']  = $version;
	$request['status']  = "Pending";
	$request['filename'] = $file;

        $response = $client->send_request($request);
	exit();
}

?>
