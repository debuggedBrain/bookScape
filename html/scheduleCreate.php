<?php
session_start();
?>
<html>
<head><h1>Schedule Builder</h1></head><br>
<body>
	<form action=../php/schedule.php method="post">
		<label>Enter username:</label>
		<input type="text" name="user" style="width: 100px" required><br>
		<label>Course name:</label>
		<input type="text" name="course1" style="width: 100px" required>
		<label>Course time:</label>
		<input type="text" name="time1" style="width: 100px" required><br>
                <label>Course name:</label>
                <input type="text" name="course2" style="width: 100px">
                <label>Course time:</label>
                <input type="text" name="time2" style="width: 100px"><br>
                <label>Course name:</label>
                <input type="text" name="course3" style="width: 100px">
                <label>Course time:</label>
                <input type="text" name="time3" style="width: 100px"><br>
                <label>Course name:</label>
                <input type="text" name="course4" style="width: 100px">
                <label>Course time:</label>
                <input type="text" name="time4" style="width: 100px"><br>
                <label>Course name:</label>
                <input type="text" name="course5" style="width: 100px">
                <label>Course time:</label>
                <input type="text" name="time5" style="width: 100px"><br>
                <label>Course name:</label>
                <input type="text" name="course6" style="width: 100px">
                <label>Course time:</label>
                <input type="text" name="time6" style="width: 100px"><br>
                <label>Course name:</label>
                <input type="text" name="course7"style="width: 100px">
                <label>Course time:</label>
                <input type="text" name="time7" style="width: 100px"><br>
                <label>Course name:</label>
                <input type="text" name="course8" style="width: 100px">
                <label>Course time:</label>
                <input type="text" name="time8" style="width: 100px"><br>

		<input type="submit" value="submit">
	</form>
</body>
</html>


