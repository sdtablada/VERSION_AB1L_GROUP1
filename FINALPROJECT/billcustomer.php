<?php
include("DBConnection.class.php");
$DBConnection = new DBConnection();
session_start();

$id = $_POST[serviceid];
$num = $_POST[room_number];
$date = $_POST[date_availed];

if(isset($_POST['submit'])){
	$result = pg_query($DBConnection->conn, "SELECT servicename, servicecharge FROM services WHERE serviceid='$_POST[serviceid]'");
	
	while($row = pg_fetch_assoc($result)){
						$name = $row['servicename'];
						$amount = $row['servicecharge'];
	}
	//echo"$name";
	//echo"$_POST[date_availed]";
	$query = pg_query($DBConnection->conn, "INSERT INTO \"bill\" (roomnumber,amount,serviceavailed,dateavailed)VALUES ('$num','$amount','$name','$date') "); //write to table bill
	 
	
	$_SESSION['billed'] = $amount;
	$_SESSION['roomnumber']= $_POST['room_number'];
	
header("location:index.php?error=0");
	
}

?>
