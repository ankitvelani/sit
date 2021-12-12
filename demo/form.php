<html>


<body>

<pre>

<form method='post'>
Name  :	<input type='text' name='user_name' />

Email : <input type='email' name='email' />

		<input type='submit' name='submit' />
</form>

</pre>

</body>
</html>

<?php

	include './DBConnection.php';
	
	$obj = new Connection();

	if(isset($_POST['submit'])){
			
			$name = $_POST['user_name'];
			$email = $_POST['email'];
			$qry = "INSERT INTO user(name,email) VALUES('$name','$email')";
			$obj->putData($qry);
			
	}

?>