<?php

include("DBConnection.class.php");
$DBConnection = new DBConnection();

	$error= 0;

	if(isset($_POST["out"])){
		$outroom = $_POST["outroom"];
				
				$query= "select * from bill where roomnumber=".$outroom;
				$result= pg_query($DBConnection->conn, $query);
				
				if(pg_num_rows($result)==0){
						$error=1;
						header("location:index.php?error={$error}");
				}
				else{
						$error=0;
						header("location:index.php?error={$error}&&outroom={$outroom}");
				}
	}
?>
