<html>

<body>

<table border='1'>
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>EMAIL</th>
	</tr>


<?php
	include 'DBConnection.php';
	
	$obj = new Connection();
	
	$qry ="SELECT * FROM user";
	
	$result = $obj->getData($qry);
	
	foreach($result as $user){
		echo "<tr>
				<td>$user[0]</td>
				<td>$user[1]</td>
				<td>$user[2]</td>
				</tr>";
	}

?>

</table>
</body>
</html>




