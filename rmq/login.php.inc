<?php
//loginDBfile
class loginDB
{
private $logindb;

public function __construct()
{
	$this->logindb = new mysqli("localhost","ali","password","490_db");

	if ($this->logindb->connect_errno != 0)
	{
		echo "Error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "Correctly  connected to database".PHP_EOL;
}

public function validateLogin($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from users where username = '$un'";
	$response = $this->logindb->query($statement);
	$date = date("Y-m-d H:i:s");
	$loginSuccess = '../logs/loginSuccess.log';
	$loginFailed = '../logs/loginFailed.log';
	$successLine ="(".$date.")"." User:{ ".$un. " } has logged in";
	$failedLine ="(".$date.")"." User:{ ".$un. " } failed reason: ";


	while ($row = $response->fetch_assoc())
	{
		echo "Checking if user $un is in database...\n";
		if ($row["username"] == $un)
		{
			echo "User $un is in the database.\n";
			echo "Checking password for $username ...".PHP_EOL;

			if ($row["password"] == $pw)
			{
				echo "Passwords match for $username .".PHP_EOL;
				echo "----DONE SEARCHING----\n\n";
				file_put_contents($loginSuccess, $successLine.PHP_EOL, FILE_APPEND);
				return 1;// password match
			}
			echo "Passwords did not match for $username".PHP_EOL;
			echo "----DONE SEARCHING----\n\n";
			file_put_contents($loginFailed, $failedLine."Password does not match".PHP_EOL, FILE_APPEND);
			return 0;
		}	
	}
	echo "User $un does not exist in the database".PHP_EOL;
	echo "----DONE SEARCHING----\n\n";
	file_put_contents($loginFailed, $failedLine."Username does not exist".PHP_EOL, FILE_APPEND);
	return 0;//no users matched username
}

public function validateRegister($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "SELECT * FROM users WHERE username = '$un'";
	$response = $this->logindb->query($statement);
	$date = date("Y-m-d H:i:s");
        $regSuccess = '../logs/regSuccess.log';
        $regFailed = '../logs/regFailed.log';
        $successLine ="(".$date.")"." User:{ ".$un. " } has been created";
        $failedLine ="(".$date.")"." User:{ ".$un. " } failed reason: ";

	echo "Searching database to see if user already exists.\n";
	if ($response->num_rows == 0)
	{
		$statement = "INSERT INTO users (username,password) VALUES('$un','$pw')";
		$this->logindb->query($statement) or die ($this->logindb->error);
		echo "Account has been created.".PHP_EOL;
		echo "----DONE REGISTERING----\n\n";
		file_put_contents($regSuccess, $successLine.PHP_EOL, FILE_APPEND);
		return 1;
	}
	else
	{
		echo "This username already exists.".PHP_EOL;
		echo "----DONE NO REGISTER----\n\n";
		file_put_contents($regFailed, $failedLine."Username already exist".PHP_EOL, FILE_APPEND);
		return 0;
	}

}

public function validateSchedule($courseInfo)
{	
	$user = $courseInfo['user'];
	for ($n=1; $<=7; $i++){
		$cString = "course".$n; //courseString
                $tString = "time".$n; //time string
		$course = $courseInfo[$tString];
		$time = $time[$tString];
		$c = $this->logindb->real_escape_string($course); //course
		$t = $time->logindb->real_escape_string($time); //time
		if ($course == $c and $time == $t)
		{
			echo "Inputs are clean... running query...\n"
			$insertSchedule = "INSERT INTO schedule ('{$cString}','{$tString}') VALUES ('$course','$time')";
			$this->logindb->query($insertSchedule) or die ($this->logindb->query($insertSchedule) WHERE ;
			echo "Query has run if no error...\n";
			echo "$user.' has entered '.$course.' and '.$time.'\n'";
			$return = 1;
		}else{
			echo "Data wasn't good...something is wrong.\n";
			$return = 0;
		}	
	}
	echo "'returned: '.$return.' and all is done.'";
	return $return;
}

}
?>
