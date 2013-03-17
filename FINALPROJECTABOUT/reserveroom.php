<?php
	include("DBConnection.class.php");
	$DBConnection = new DBConnection();
	session_start();
		
	
	if(isset($_POST['reserve'])){
		
		$username = $_SESSION['name'];
		$arrival = $_POST['arrival'];
		$departure = $_POST['departure'];
		$roomnumber = $_POST['roomnumber'];
		
		$upd1query = pg_query($DBConnection->conn, "UPDATE \"room\" SET roomstatus = 'reserved' WHERE roomnumber = '$roomnumber'");
		$upd2query = pg_query($DBConnection->conn, "UPDATE \"room\" SET arrivaldate = '$arrival' WHERE roomnumber = '$roomnumber'");
		$upd3query = pg_query($DBConnection->conn, "UPDATE \"room\" SET departuredate = '$departure' WHERE roomnumber = '$roomnumber'");
		$upd4query = pg_query($DBConnection->conn, "UPDATE \"room\" SET username = '$username' WHERE roomnumber = '$roomnumber'");
		$_SESSION['reserved'] = $roomnumber;
	}
	header("location:index.php?error=0");
?>
