<html>
<body>
<form action="sellprice.php" method="post">
<?php
session_start();
require('addbutton.php');
$conn = new mysqli('127.0.0.1','ali', 'password', '490_db');
if($conn->connect_error){
	die("COnnection failed: ".$conn->_error);
}
?>
<input type='number' name='pricetag' id='pricetag'/> <br>
<input type='submit' value='submit'/>
</form>
<?php
$price = $_POST['pricetag']; 
if(isset($_POST['submit'])){
	$squery = "INSERT INTO books_owned(bookISBN, bookName, bookAuthor, username, priceTag) VALUES('$bISBN', '$bname', $bauthor', '$user','$price')";
	if($conn->query($squery) === TRUE){
		echo "Book is now available for sale by $user";
		header('Location: books.php');
	}
	else{
		echo "Error: ".$squery."<br>".$conn->error;
		header("Refresh:0");
	}
}
$conn->close();
?>
</body>
</html>

