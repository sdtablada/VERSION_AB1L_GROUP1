<?php
include_once 'includes/header.php';
//include("DBConnection.class.php");
//$DBConnection = new DBConnection();
?>
<?php

$error=0;
	if(isset($_POST["reserve"])){
		$_SESSION['res'] = 'true';
	}
	else if(isset($_POST["walk"])){
		$_SESSION['nores'] = 'true';
	}
	
	if(isset($_POST['start'])){
		//$loginid = $_POST["loginid"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$contact = $_POST["contact"];
		$room = $_POST["room"];
		$arrdate = $_POST["arrdate"];
		$depdate = $_POST["depdate"];
		
		$query = "select * from walkin where room=".$room;
		$res = pg_query($DBConnection->conn, $query); 
	
		if(pg_num_rows($res)==0){
		if ((strlen($address) >= 1 and strlen($address) <= 50)
		and (strlen($email) >= 1 and strlen($email) <= 55) and (strlen($firstname) >= 1 and strlen($firstname) <= 25)
		and (strlen($lastname) >= 1 and strlen($lastname) <= 25) and (strlen($contact) >= 1 and strlen($contact) <= 11) 
		and (strlen($room) >= 1 and strlen($room) <= 3)){
		
					$query3 = "insert into walkin (firstname, lastname, address, email, contact, room) values('".$firstname."', '".$lastname."', '".$address."', '".$email."', '".$contact."', $room )";
					pg_query($DBConnection->conn, $query3);
					
					
					$query4= "UPDATE room SET roomstatus = 'occupied', username='".$firstname.$lastname. "',arrivaldate='".$arrdate."', departuredate='".$depdate."' WHERE roomnumber =".$room;	
					pg_query($DBConnection->conn, $query4);
					
					$query5= "INSERT into bill(roomnumber, amount, serviceavailed, dateavailed) values ($room, 5000, 'Room Charge', '".$arrdate."')";
					pg_query($DBConnection->conn, $query5);
					
						$_SESSION['checkin'] = $_POST['room'];
					}
					
					
				}
	}
	
	
	if(isset($_POST['find'])){
		$username= $_POST["username"];
			$roomnumber= $_POST["roomnumber"];
			
		
				$query = "select * from room where (username = '".$username."' AND roomstatus= 'reserved' AND roomnumber= $roomnumber)";	
				$result= pg_query($DBConnection->conn, $query);	
					if(pg_num_rows($result)==0){
						$error=1;		
					}
					else{
						$que= "select * from room where username= '".$username."' AND roomstatus='occupied'";
						$res = pg_query($DBConnection->conn, $que);
						
						if(pg_num_rows($res)==0){
						$upd1query = "UPDATE room SET roomstatus = 'occupied' WHERE username = '".$username."' AND roomnumber=".$roomnumber;						
						pg_query($DBConnection->conn, $upd1query);
						
						
						$upd2query= "INSERT into bill(roomnumber, amount, serviceavailed, dateavailed) values ($roomnumber, 5000, 'Room Charge', current_date)";
						pg_query($DBConnection->conn, $upd2query);
					
					$_SESSION['checkin2'] = $_POST['roomnumber'];
				}
						else{
							$error=2;
						}
					}
			
					}
			

	
	
	
		
					
	

header("location:index.php?error={$error}");
?>
