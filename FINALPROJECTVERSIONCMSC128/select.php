<?php
include("DBConnection.class.php");
$DBConnection = new DBConnection();
$resquery = pg_query($DBConnection->conn, "SELECT roomnumber FROM \"room\" WHERE roomstatus = 'vacant' order by roomnumber");
//added to reduce footer.php length
?>