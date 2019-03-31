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
         padding: 5px;
         }
      </style>
   </head>
   <body>
      <div class="container mt-4">
      <h1 class="display-4 text-center">
         <i class="fas fa-book-open text-primary"></i> Book <span class="text-primary"> Scape </span> 
      </h1>
      <br>
      <h1>Welcome <?php echo " $user !"; ?></h1>
      <form action="logout.php" method="post">
         <input name="logout" type="submit" id="logout" value="logout">
      </form>
	<center>
      <!-- Showing schedule being being fetched from DB and schedule button-->
      <h3>Your generated schedule: </h3>
      <table id = "table">
         <?php
            $scheduleQuery = "SELECT * FROM schedule RIGHT JOIN courses ON schedule.course=courses.code WHERE schedule.user='$user'";
            $result2 = $conn->query($scheduleQuery);
            if($result2->num_rows > 0){
            	echo "<tr><th>Course#</th><th>Course</th><th>Professor</th><th>Time</th><th>Book</th><th>ISBN</th></tr>";
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
      </form>
      <br>
      <!-- Sellers who have the book for courses IN PROGRESS -->
         <h3>Sellers available for your book: </h3>
	<tableid = "table">
         <?php
            $findSellerQuery = "select selling.user AS seller, selling.price AS price, selling.title AS title, selling.ISBN AS ISBN from selling right join courses on courses.bookISBN=selling.ISBN right join schedule on schedule.course=courses.code where schedule.user='$user'";
            $result3 = $conn->query($findSellerQuery);
            if($result3->num_rows > 0){
                echo "<tr><th>Seller</th><th>Price</th><th>ISBN</th><th>Title</th></tr>";
                while($row3 = $result3->fetch_assoc()){
                        echo "<tr><td>$row3[seller]</td><td>$row3[price]</td><td>$row3[ISBN]</td><td>$row3[title]</td></tr><br />";
                }
            }else{
                        echo "No books reccomended or being sold";
            }

            ?>
	</table>
      <!-- Showing books being sold by user and sell button -->
<h3>Books currently being sold by you: </h3>
      <tableid = "table">
      <?php
         $sellQuery = "SELECT * FROM selling WHERE user='$user'";
         $result1 = $conn->query($sellQuery);
         if($result1->num_rows > 0){
		echo "<tr><th>Title</th><th>Price</th><th>ISBN</th></tr>";
         	while($row = $result1->fetch_assoc()){
         		echo "<tr><td>$row[title]</td><td>$$row[price]</td><td>$row[ISBN]</td></tr><br />";
         	}
         }else{
         		echo "Nothing is being sold by you";
         }
         ?>
      </table>
      <form action="../html/sellBooks.php">
         <button type="submit">Sell A Book</button>
      </form>
      <h3>Manually search for a book:</h3>
      <input type = "search" id = "books">
      <label for "search"><label>
      <button type = "button" id = "b">g books</button>
      <div id="result"></div>
      <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src = "../html/my.js"></script>
     </center>
   </body>
   <a href = "/html/terms.html">terms and conditions</a>
</html>
<style>
	#table{margin: auto; background:gray; box-shadow: 3px 5px 3px 3px;}
</style>
      
     
