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
    <title>BookScape</title>
</head>
<body><center>
    <div class="container mt-4">
    <h1 class="display-4 text-center">
    <i class="fas fa-book-open text-primary"></i> Book <span class="text-primary"> Scape </span> </h1><br></div>
    <form action=../php/sellers.php method="post">
        <label>Enter username:</label>
        <input type="text" name="user" style="width: 100px" required><br>
        <label>Book title:</label>
        <input type="text" name="book" style="width: 100px" required>
        <label>ISBN #:</label>
        <input type="text" name="isbn" style="width: 100px" required>
        <label>Price:</label>
        <input type="text" name="price" style="width: 100px" required><br>
        <input type="submit" value="submit">
    </form>
</center></body>
</html>
