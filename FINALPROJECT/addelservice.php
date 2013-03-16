<?php
     include("DBConnection.class.php");
	$DBConnection = new DBConnection();
     
     session_start();
	 $servicename = $_POST[servicename];
     $servicecharge = $_POST[servicecharge];
     if(isset($_POST['addservice'])){
          $query = pg_query($DBConnection->conn, "SELECT * FROM \"services\" WHERE (servicename='$servicename' and servicecharge='$servicecharge')");
          $result = pg_fetch_row($query);
          if($result==null){
               $bquery = pg_query($DBConnection->conn,"INSERT INTO \"services\" (servicename,servicecharge,serviceid) VALUES ('$servicename','$servicecharge',default)");
               $_SESSION['serviceadded'] = $servicename;
          }else{
               $_SESSION['servicenotadded'] = $servicename;
          }
     }
     
     if(isset($_POST['delservice'])){
          $query = pg_query($DBConnection->conn, "SELECT * FROM \"services\" WHERE (servicename='$servicename' and servicecharge='$servicecharge')");
          $result = pg_fetch_row($query);
          if($result!=null){
               $bquery = pg_query($DBConnection->conn, "DELETE FROM \"services\" WHERE (servicename='$servicename')");
               $_SESSION['servicedeleted'] = $servicename;
          }else{
               $_SESSION['noservice'] = $servicename;
          }
     }
     
    header("location:index.php?error=0");
?>