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
    <form action=../php/sellers.php method="post">
        <label>Book title:</label>
        <input style ="border-radius: 4px;"type="text" name="title" style="width: 100px" required>
        <label>ISBN #:</label>
        <input style ="border-radius: 4px;" type="text" name="ISBN" style="width: 100px" required>
        <label>Price:</label>
        <input style ="border-radius: 4px;" type="number" step="0.01" name="price" style="width: 100px" required><br>
        <input style = "color: white; background:#B4A8A8; border-radius: 4px; width: 130px; height: 35px;"type="submit" value="submit">
    </form>
<h3>Search for a book:</h3>
      <input style ="border-radius: 4px;"type = "search" id = "books">
      <label for "search"><label>
      <button style = "color: white; background:#B4A8A8; border-radius: 4px; width: 130px; height: 35px;" type = "button" id = "b">g books</button>
      <div id="result"></div>
      <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src = "my.js"></script>
</center></body>
</html>
