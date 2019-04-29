<?php
session_start();
$bISBN = $_GET['data.items[i].volumeInfo.industryIdentifiers[1].identifier'];//book ISBN
$bname = $_GET['data.items[i].volumeInfo.title']; //book name
$bauthor = $_GET['data.items[i].volumeInfo.authors']; //book author
$user = $_SESSION['userid']; //username

if(isset($_POST['own'])){
	header('Location: sellprice.php');
}
?>
