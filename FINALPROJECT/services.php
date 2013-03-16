<?php
     include("DBConnection.class.php");
	$DBConnection = new DBConnection();
     
     session_start();
     $username = $_SESSION['name'];
     $servicename = $_REQUEST['servicename'];
     
     $squery = pg_query($DBConnection->conn, "SELECT roomnumber FROM \"room\" WHERE (username='$username') ");
     while ($row=pg_fetch_assoc($squery)){
          $r =  $row['roomnumber'];     // assign room number to a variable
     };
     
     $uquery = pg_query($DBConnection->conn, "SELECT servicecharge FROM \"services\" WHERE (servicename='$servicename')");
     while ($row=pg_fetch_array($uquery)){
          $c = $row['servicecharge'];   // assign service charge to a variable
     };
     
     if(isset($_REQUEST['servicename'])){
          $bquery = pg_query($DBConnection->conn,"INSERT INTO \"bill\" (roomnumber,amount,serviceavailed,dateavailed) VALUES ($r,$c,'$servicename',current_date)");
     }
     
    header("location:index.php?error=0");
?>