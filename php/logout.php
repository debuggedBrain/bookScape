<?php
session_start();
if(isset($_POST['logout'])){
	$logoutFile = "../logs/logout.log";
	$date = date("Y-m-d H:i:s");
	$successLine = "(".$date.") { ".$_SESSION['user_id']." }"."successfully logged out";
	session_destroy();
	echo "You are now logged out";
	file_put_contents($logout, $successLine.PHP_EOL, FILE_APPEND);
	echo "<a href='../index.php'>\nReturn to homepage</a>";
}
else{
	echo "logout incorrectly";
	echo "<a href='success.php'>\nReturn to homepage</a>";
}
?>



