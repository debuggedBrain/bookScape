#/usr/bin/php
<?php
 	require_once('path.inc');
        require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');
	getFile(); 
	function getFile()
	{
		$file = shell_exec("./getPack.sh");
		echo "Current host package is: $file".PHP_EOL;
		updateTable($file);
	}

	function updateTable($file)
	{
		$getIP = shell_exec("ifconfig enp0s3 | grep 'inet ' | awk '{print $2}' | cut -d/ -f1");
        echo "Machine IP is: $getIP";
        $machineType  = "";
                if (trim($getIP) == "192.168.1.110"){
			$machineType = "FE";
			$lvl = "Prod";
                }               
                else{
                	$machineType = "BE";
			$lvl = "Prod";
                }
		echo "Changing status for ".$machineType." ".$file."\n";
		$status = "bad";
		$filename = trim($file);
		$version = substr($filename,-5,1);
		$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
                $request= array();
		$request['type'] = "changeStatus";
		$request['lvl'] = $lvl;
		$request['machine'] = $machineType;
		$request['version'] = $version ;
		$request['file'] = $filename;
		$request['status'] = trim($status);
                $response = $client->send_request($request);
		echo"$response".PHP_EOL;
		echo"Status has been changed... on to the next".PHP_EOL;
		sleep(5);
		getOld($lvl,$machineType);
		
	}

function getOld($lvl,$machineType)
{
       	echo"Able to recieve old package".PHP_EOL;
        $client = new rabbitMQClient("testRabbitMQ.ini","Prod");
                $request= array();
                $request['type'] = "getOld";
                $request['lvl'] = $lvl;
                $request['machine'] = $machineType;
		$old = $client->send_request($request);
		if ($old == "false")
		{echo"The response is $old...".PHP_EOL;}
		if ($old == "false")
                {
                $msg = "ERROR: there is no previously working package $lvl : $machineType found.";    
		echo"$msg".PHP_EOL;
		exit();
                }       
		else
		{$file = trim($old);
                download_pkg($lvl,$machineType,$file);
		}
}
function download_pkg($lvl,$machineType,$file)
{
	 echo"The last package working was $lvl $machineType $file".PHP_EOL;
		exec("./getOldPack.sh $machineType $file");
}
?>
