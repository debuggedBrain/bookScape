<?php
session_start();
?>
<html
<title>Login</title>
<body>
        <h1>Login here:</h1><br>
	<form action=/php/login.php method="post">
        	<label>Username:</label>
                <input type="username" name="username"/><br>
                <label>Password:</label>
		<input type="password" name="password"/><br>
                <input type="submit" value="submit">
	</form><br><br><br>
	<h1>Register here:</h1><br>
	<form action=/php/register.php method="post">
                <label>Username:</label>
                <input type="username" name="regusername"/><br>
                <label>Password:</label>
                <input type="password" name="regpassword"/><br>
                <input type="submit" value="submit">

        </body>
</html>
