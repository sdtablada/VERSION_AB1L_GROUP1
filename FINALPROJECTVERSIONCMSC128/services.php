<?php
     include("DBConnection.class.php");
	$DBConnection = new DBConnection();
     
     session_start();
     $username = $_SESSION['name'];
     $servicename = $_REQUEST['servicename'];
     
     $squery = pg_query($DBConnection->conn, "SELECT roomnumber,roomstatus FROM \"room\" WHERE (username='$username') ");
     $row=pg_fetch_assoc($squery);
     $r =  $row['roomnumber'];     // assign room number to a variable
	 $rs = $row['roomstatus'];
     
     $uquery = pg_query($DBConnection->conn, "SELECT servicecharge FROM \"services\" WHERE (servicename='$servicename')");
     $row=pg_fetch_array($uquery);
     $c = $row['servicecharge'];   // assign service charge to a variable
     
     if(isset($_REQUEST['servicename'])){
		if($rs=='occupied'){
          $bquery = pg_query($DBConnection->conn,"INSERT INTO \"bill\" (roomnumber,amount,serviceavailed,dateavailed) VALUES ($r,$c,'$servicename',current_date)");
		  $_SESSION['availed']=$servicename;
		}else{
			$_SESSION['not']=$servicename;
		}
	 }
     
    header("location:index.php?error=0");
?>