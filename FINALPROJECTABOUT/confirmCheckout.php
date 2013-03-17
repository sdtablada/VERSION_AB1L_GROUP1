<?php

include("DBConnection.class.php");
$DBConnection = new DBConnection();

			$error=0;
		if(isset($_POST['confirmOut'])){
					$query = "update room set roomstatus='vacant', username=NULL, arrivaldate=NULL, departuredate=NULL  where roomnumber=".$_GET['outroom']." AND roomstatus='occupied'";
				pg_query($DBConnection->conn, $query);
				
					$query2= "delete from bill where roomnumber=".$_GET['outroom'];
						pg_query($DBConnection->conn, $query2);
						
				header("location:index.php?error=3");
						
						
		}
		else if (isset($_POST['cancelOut'])){
				header("location:index.php?error=0");
		}
	
				
?>
