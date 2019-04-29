<html>
<body>
<form method="post">
<?php
session_start();
$conn = new mysqli('127.0.0.1','ali', 'password', '490_db');
if($conn->connect_error){
        die("Connection failed: ".$conn->_error);
}

$bISBN = $_GET['data.items[i].volumeInfo.industryIdentifiers[1].identifier'];
$sql = "SELECT * FROM books_owned where bookISBN='$bISBN'";
$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "$row[bookISBN].$row[bookName].$row[bookAuthor].$row[username].$row[priceTag] <br />";
		echo "<input type='submit' value='Buy It' />"
	}
}
?>
</form>
<?php
if(isset($_POST['Buy It'])){
	//insert paypal exchange here
}
?>
</body>
</html>
