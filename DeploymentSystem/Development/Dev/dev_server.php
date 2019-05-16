#!/usr/bin/php
<?php
 	require_once('path.inc');
        require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');

	function chkV($machine)
	{
		echo "Getting last Version # for ".$machine.PHP_EOL;
		$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

		if(!$client )
		{
		$client = new rabbitMQClient("testRabbitMQ.ini","slaveServer");
		}

		$request= array();
		$request['type'] = "chkV";
		$request['machine'] = $machine;
		$response = $client->send_request($request);

		echo"Last Version number is $response \n";

		$newVerNum = $response+1;
	
		 return $newVerNum;
	}
	
	function doUpdate($nextV,$machine)
	{
		$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

		$myip = shell_exec("ifconfig enp0s3 | grep 'inet ' | awk '{print $2}' | cut -d/ -f1");
                $lvl = "Dev";
                $fname = $machine."_version_".$nextV.".zip";
                //echo "file name is: $fname  \n";

                $request            =   array();
                $request['type']    =   "updateTable";
                $request['ip']      =   trim($myip);
                $request['lvl']     =   $lvl;
                $request['machine'] =   $machine;
                $request['version'] =   $nextV;
                $request['filename']=   $fname;

                $response = $client->send_request($request);
	}

	function makeNewVersion($machine)
	{	
		$nextV = chkV($machine);
		echo"Our new Version Number is $nextV \n";
		shell_exec("../package.sh $machine $nextV");
	 	$Update = doUpdate($nextV,$machine);
	}

	$ip = shell_exec("ifconfig enp0s3 | grep 'inet ' | awk '{print $2}' | cut -d/ -f1");
	echo "Your IP is: $ip";
	$machineType  = "";
	
		if (trim($ip) == "192.168.1.102"){

			$machineType = "FE";
		}		
		else{
		
			$machineType = "BE";
		}

		echo "Creating new Version for ".$machineType."\n";
		makeNewVersion($machineType);
?>
