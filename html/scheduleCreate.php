<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intiial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.min.css">
    
    <link rel="stylesheet" href="login.css" type="text/css">
	<style>
	body{
	background-color: #EFEEEE;
	background: url(images/background2.png);
	}
	

	</style>
    <title>BookScape</title>
</head>
<body><center>
    <div class="container mt-4">
    <h1 class="display-4 text-center">
    <i class="fas fa-book-open text-primary"></i> Book <span class="text-primary"> Scape </span> </h1><br></div>
	<form action=../php/schedule.php method="post">
		<label>Course name:</label>
		<input type="text" name="course1" style="width: 130px; border-radius: 4px;" required><br>
                <label>Course name:</label>
                <input type="text" name="course2" style="width: 130px; border-radius: 4px;"><br>
                <label>Course name:</label>
                <input type="text" name="course3" style="width: 130px;border-radius: 4px;"><br>
                <label>Course name:</label>
                <input type="text" name="course4" style="width: 130px;border-radius: 4px;"><br>
                <label>Course name:</label>
                <input type="text" name="course5" style="width: 130px;border-radius: 4px;"><br>
                <label>Course name:</label>
                <input type="text" name="course6" style="width: 130px;border-radius: 4px;"><br>
                <label>Course name:</label>
                <input type="text" name="course7"style="width: 130px;border-radius: 4px;"><br>
		<input style = "color: white; background:#B4A8A8; border-radius: 4px; width: 130px; height: 35px;" type="submit" value="submit">
	</form>
</center></body>
</html>

