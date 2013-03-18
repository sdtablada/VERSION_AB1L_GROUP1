<?php
include("DBConnection.class.php");
$DBConnection = new DBConnection();
session_start();
	if (isset($_POST['login'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];

	   
		if (strlen($username) > 0 && strlen($password) > 0 ) {
				$selquery = pg_query($DBConnection->conn, "SELECT username, password, type FROM \"user\" WHERE username = '$username' AND password = '$password'");
				while($row = pg_fetch_row($selquery)){ $type = $row[2]; }
				if(pg_num_rows($selquery)){ $_SESSION['name'] = $username; $_SESSION['type'] = $type; }
				else{ $_SESSION['logerr'] = 'true';}
				
		}else{ $_SESSION['logerr'] = 'true';}	
		header("Location:index.php?error=0");
	}

?>