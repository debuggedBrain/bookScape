<?php
session_start();
?>
<html>
<h1>Welcome!</h1>
<body>
	<form action="logout.php" method="post">
	<input name="logout" type="submit" id="logout" value="logout">
	</form><br>
	
	<form action="..html/scheduleCreate.php">
	<button type="submit">Create Schedule</button>
	</form><br>

</body>
</html>
