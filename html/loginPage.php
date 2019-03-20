<?php
session_start();
?>
<html>
<center>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intiial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
	integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.min.css">
	
	<!-- Personal Stylesheets -->
	<link rel="stylesheet" href="login.css" type="text/css">
	<title>BookScape</title>
</head>

<body>
	<div class="container mt-4">
		<h1 class="display-4 text-center">
		<i class="fas fa-book-open text-primary"></i> Book <span class="text-primary"> Scape </span> </h1><br>
		<h1>Login</h1><br>
		<form id="login" method="post" action="/php/login.php">
	<div class="form-group">
		<label for="username"> Username </label>
		<input id="username" name="username" class="form-control" type="text" required>
	</div>
	<div class="form-group">
		<label for="password"> Password </label>
		<input id="password" name="password" class="form-control" type="password" required>
		<input type="submit" value="submit" class="btn btn-primary btn-block">
		</form>
	</div><br><h1>Register</h1><br>
		<form id="login" method="post" action="/php/register.php">
	<div class="form-group">
		<label for="username"> Username </label>
		<input id="username" name="username" class="form-control" type="text" required>
	</div>
	<div class="form-group">
		<label for="password"> Password </label>
		<input id="password" name="password" class="form-control" type="password" required>
		<input type="submit" value="submit" class="btn btn-primary btn-block">
		</form>
	</div>
</body>
</center>
</html>
