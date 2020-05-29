<?php
	include("connection.php");
	
	if(isset($_POST['submit']) == TRUE){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "SELECT COUNT(*) AS CountRow FROM user WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($row['CountRow'] == 1){
			header('location:index.php');
		}else{
			echo "Invalid.";
		}
	}
?>

<form method = "POST" action = "login.php">
<label>Username</label><input type = "textbox" name = "username"/>
<label>Password</label><input type = "password" name = "password"/>
<input type = "submit" name = "submit">
</form>