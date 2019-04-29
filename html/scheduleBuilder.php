<?php
	if(isset(@REQUEST['submit']))
	{
		echo "<tr><td>". $row["id"] ."</tr><td>". $row["Inputted Information"] ."</tr><td>";
	}
	
	echo "</table>";

	
	<tr>
		<th colspan="2">
			<?php
				if(isset(@_REQUEST['submit']))
				{
					function userINfo($fname, $lname, $c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8){
					echo "$fname $lname: <br> ";
					echo "$c1 <br> ";
					echo "$c2 <br> ";
					echo "$c3 <br> ";
					echo "$c4 <br> ";
					echo "$c5 <br> ";
					echo "$c6 <br> ";
					echo "$c7 <br> ";
					echo "$c8 <br> ";
					}
				}
			?>
		</th>
	</tr>
?>
