<?php
include("DBConnection.class.php");
$DBConnection = new DBConnection();
session_start();
$error=0;
$id = $_POST[serviceid];
$num = $_POST[room_number];
$date = $_POST[date_availed];

if(isset($_POST['submit'])){
	$result1 = pg_query($DBConnection->conn, "SELECT roomstatus,roomnumber FROM room WHERE (roomstatus='occupied' and roomnumber='$_POST[room_number]')");
	$result = pg_query($DBConnection->conn, "SELECT servicename, servicecharge FROM services WHERE serviceid='$_POST[serviceid]'");
	if(pg_fetch_assoc($result1)!=null){
		while($row = pg_fetch_assoc($result)){
							$name = $row['servicename'];
							$amount = $row['servicecharge'];
		}
		$query = pg_query($DBConnection->conn, "INSERT INTO \"bill\" (roomnumber,amount,serviceavailed,dateavailed)VALUES ('$num','$amount','$name','$date') "); //write to table bill
		$_SESSION['billed'] = $amount;
		$_SESSION['roomnumber']= $_POST['room_number'];
	}
	else{
		$error=1;
	}


	
}
header("location:index.php?error={$error}");
?>
