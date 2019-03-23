<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','1');
$conn = new mysqli('127.0.0.1','ali', 'password', '490_db');
$user = $_SESSION['user_id'];
if($conn->connect_error){
        die("Connection failed: ".$conn->_error);
}
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
	<style>
		table,th,td{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<div class="container mt-4">
	<h1 class="display-4 text-center">
	<i class="fas fa-book-open text-primary"></i> Book <span class="text-primary"> Scape </span> </h1><br>
	<h1>Welcome <?php echo " $user !"; ?></h1>
	<form action="logout.php" method="post">
	<input name="logout" type="submit" id="logout" value="logout">
	</form>		
<!-- Showing schedule being being fetched from DB and schedule button-->
	<h3>Your generated schedule: </h3>
	<table>
	<?php
		$scheduleQuery = "SELECT * FROM schedule RIGHT JOIN courses ON schedule.course=courses.code WHERE schedule.user='$user'";
		$result2 = $conn->query($scheduleQuery);
		if($result2->num_rows > 0){
			while($row2 = $result2->fetch_assoc()){
				echo "<tr><td>$row2[code]</td><td>$row2[courseName]</td><td>$row2[professor]</td><td>$row2[time]</td><td>$row2[bookTitle]</td><td>$row2[bookISBN]</td></tr><br />";
			}
		}else{
				echo "No schedule has been created";
		}
	?>
	</table>
	<form action="../html/scheduleCreate.php">
	<button type="submit">Create Schedule</button>
	</form><br>
		
<!-- Sellers who have the book for courses IN PROGRESS
	<h3>Sellers available for your book: </h3><br>
	<?php/*
		$findSellerQuery = "SELECT * FROM selling RIGHT JOIN courses ON schedule.course=courses.code WHERE schedule.user='$user'";
		$result2 = $conn->query($scheduleQuery);
		if($result2->num_rows > 0){
			while($row2 = $result2->fetch_assoc()){
				echo "$row2[code], $row2[courseName], $row2[professor], $row2[time], $row2[bookTitle], $row2[bookISBN]<br />";
			}
		}else{
				echo "No schedule has been created";
		}*/
	?>

	<form action="../html/scheduleCreate.php">
	<button type="submit">Create Schedule</button>
	</form><br>
 -->
		
<!-- Showing books being sold by user and sell button -->
	<h3>Books currently being sold by you: </h3><br>
	<?php
		$sellQuery = "SELECT * FROM selling WHERE user='$user'";
		$result1 = $conn->query($sellQuery);
		if($result1->num_rows > 0){
			while($row = $result1->fetch_assoc()){
				echo "Title:  $row[title]    Price: $$row[price]   ISBN#: $row[ISBN] <br />";
			}
		}else{
				echo "Nothing is being sold by you";
		}
	?>
	<form action="../html/sellBooks.php">
	<button type="submit">Sell A Book</button>
	</form>

</body>
</html>
