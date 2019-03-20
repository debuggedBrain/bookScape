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
<body>
	<div class="container mt-4">
	<h1 class="display-4 text-center">
	<i class="fas fa-book-open text-primary"></i> Book <span class="text-primary"> Scape </span> </h1><br>

	<form action="logout.php" method="post">
	<input name="logout" type="submit" id="logout" value="logout">
	</form>
	
	<form action="../html/scheduleCreate.php">
	<button type="submit">Create Schedule</button>
	</form>
	
	<form action="../html/seller.php">
	<button type="submit">Sell Book</button>
	</form>

</body>
</html>
