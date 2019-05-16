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
	<style>
	body{
	background: url(images/background3.png),url(images/background1.png);
	background-repeat: no-repeat,no-repeat;
	background-position:left,right;
	background-size: 50%;
	
	}
	.form-group{
	width: 30%;
    box-sizing: border-box;
	}
	select{
	width:100%;
	height:6.5%;
	outline-color: #F6ABAB;
	color: #656464;
	box-sizing: border-box;
	border-radius: .3em;
	border-color:	#C0C0C0;
	}
	
	
</style>
</head>
<body>
	<div align ="center" class="container mt-4">
		<h1 class="display-4 text-center">
		<i class="fas fa-book-open text-primary"></i> Book <span class="text-primary"> Scape </span> </h1><br>
		<h1>Login</h1>
		<form id="login" method="post" action="/php/login.php">
	<div class="form-group" >
		<!--<label for="username"> Username </label>-->
		<input id="username" name="username" class="form-control" type="text" required placeholder = "Username">
	</div>
	<div class="form-group">
		<!--<label for="password"> Password </label>-->
		<input id="password" name="password" class="form-control" type="password" required placeholder = "Password"><br>
		<input type="submit" value="Sign in" class="btn btn-primary btn-block">
		</form>
	</div><h1>Register</h1>
		<form id="login" method="post" action="/php/register.php">
	<div class="form-group">
		<!--<label for="username"> Username </label>-->
		<input id="username" name="regusername" class="form-control" type="text" required placeholder = "Username">
	</div>
	<div class="form-group">
		<!--<label for="password"> Password </label>-->
		<input id="password" name="regpassword" class="form-control" type="password" required placeholder = "Password"><br>
		<select>
		<option value="NJIT Students">NJIT Students</option>
		<option value="Rutgers Students">Rutgers Students</option>
		<option value="Others ">Others</option>
		</select><br><br>
		<input type="submit" value="Submit" class="btn btn-primary btn-block">
		</form>
	</div>
</body>
</center>
</html>
