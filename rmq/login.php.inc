<?php

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
				return 1;// password match
			}
			echo "Passwords did not match for $username".PHP_EOL;
			echo "----DONE SEARCHING----\n\n";
			return 0;
		}	
	}
	echo "User $un does not exist in the database".PHP_EOL;
	echo "----DONE SEARCHING----\n\n";
	return 0;//no users matched username
}

public function validateRegister($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "SELECT * FROM users WHERE username = '$un'";
	$response = $this->logindb->query($statement);
	echo "Searching database to see if user already exists.\n";
	if ($response->num_rows == 0)
	{
		$statement = "INSERT INTO users (username,password) VALUES('$un','$pw')";
		$this->logindb->query($statement) or die ($this->logindb->error);
		echo "Account has been created.".PHP_EOL;
		return 1;
	}
	else
	{
		echo "This username already exists.".PHP_EOL;
		return 0;
	}

}
}
?>
