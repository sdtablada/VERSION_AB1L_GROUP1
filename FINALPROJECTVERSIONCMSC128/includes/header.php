<?php
	include("DBConnection.class.php");
	$DBConnection = new DBConnection();
	$resquery = pg_query($DBConnection->conn, "SELECT roomnumber FROM \"room\" WHERE roomstatus = 'vacant'");
	session_start();
?>
<html>
	<head>
		<title> Hotel Atalia | Hotel Rooms & Reservations </title>
		<link rel="stylesheet" type="text/css" href="style/styles.css"/>				
		<script type="text/javascript" src="js/jquery.js"></script>	
		<script type="text/javascript" src="js/atalia.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.all.latest.js"></script>
				
	</head>

	<body>
	
	<div id="topheader">	
	
	<?php if(isset($_SESSION['name'])){
			if($_SESSION['type']=="customer"){
				echo "<div class=\"logname\">Hi  {$_SESSION['name']}!  <a href =\"logout.php\" onclick=\"confirmLogout();\">Log out</a> </div>";
			}
			else{
				echo "<div class=\"logname\">Hi Admin! <a href =\"logout.php\" onclick=\"confirmLogout();\">Log out</a></div>";
			}
		}else{
			echo "<a href =\"#\" id=\"signin\">Sign In </a>				 
				<a href=\"#\" id=\"register\"> Not a member? Signup. </a>";
	}
	?>
	</div>
	<div id="midheader">				
		<?php 
		if(isset($_SESSION['name'])){
			if($_SESSION['type']=="customer"){
				echo "<a href=\"#\" id=\"about\">ABOUT THE HOTEL</a>|";
				echo "<a href=\"#\" id=\"roomreserve\">ROOM RESERVATION</a>|";
				echo "<a href=\"#\" id=\"services\">SERVICES</a> |";
				echo "<a href=\"#\" id=\"recentactivities\">RECENT ACTIVITIES</a>|";
				echo "<a href=\"#\" id=\"billsandexpenses\">BILLS & EXPENSES</a>";
				echo "<a href=\"#\" id=\"hotelstatOpt\" style=\"display:none;\">HOTEL STATISTICS</a>";
				echo "<a href=\"#\" id=\"rmstatOpt\" style=\"display:none;\">ROOM STATUS</a>";
				echo "<a href=\"#\" id=\"serviceOpt\" style=\"display:none;\">SERVICES</a>";
				echo "<a href=\"#\" id=\"billingOpt\" style=\"display:none;\">BILLING</a>";
				echo "<a href=\"#\" id=\"checkinOpt\" style=\"display:none;\">CHECK-IN</a>";
				echo "<a href=\"#\" id=\"checkoutOpt\" style=\"display:none;\">CHECK-OUT</a>";
			}
			else{
				echo "<a href=\"#\" id=\"about\" style=\"display:none;\">ABOUT THE HOTEL</a>";
				echo "<a href=\"#\" id=\"roomreserve\" style=\"display:none;\">ROOM RESERVATION</a>";
				echo "<a href=\"#\" id=\"services\" style=\"display:none;\">SERVICES</a>";
				echo "<a href=\"#\" id=\"recentactivities\" style=\"display:none;\">RECENT ACTIVITIES</a>";
				echo "<a href=\"#\" id=\"billsandexpenses\" style=\"display:none;\">BILLS & EXPENSES</a>";
				echo "<a href=\"#\" id=\"hotelstatOpt\">HOTEL STATISTICS</a><color:black>|";
				echo "<a href=\"#\" id=\"rmstatOpt\">ROOM STATUS</a> |";
				echo "<a href=\"#\" id=\"serviceOpt\">SERVICES</a> |";
				echo "<a href=\"#\" id=\"billingOpt\">BILLING</a>|";
				echo "<a href=\"#\" id=\"checkinOpt\">CHECK-IN</a> |";
				echo "<a href=\"#\" id=\"checkoutOpt\">CHECK-OUT</a>";
			}
		}else{
				echo "<a href=\"#\" id=\"about\">ABOUT THE HOTEL</a>";
				echo "<a href=\"#\" id=\"roomreserve\" style=\"display:none;\">ROOM RESERVATION</a>";
				echo "<a href=\"#\" id=\"services\" style=\"display:none;\">SERVICES</a>";
				echo "<a href=\"#\" id=\"recentactivities\" style=\"display:none;\">RECENT ACTIVITIES</a>";
				echo "<a href=\"#\" id=\"billsandexpenses\" style=\"display:none;\">BILLS & EXPENSES</a>";
				echo "<a href=\"#\" id=\"hotelstatOpt\" style=\"display:none;\">HOTEL STATISTICS</a>";
				echo "<a href=\"#\" id=\"rmstatOpt\" style=\"display:none;\">ROOM STATUS</a>";
				echo "<a href=\"#\" id=\"serviceOpt\" style=\"display:none;\">SERVICES AVAILED</a>";
				echo "<a href=\"#\" id=\"billingOpt\" style=\"display:none;\">BILLING</a>";
				echo "<a href=\"#\" id=\"checkinOpt\" style=\"display:none;\">CHECK-IN</a>";
				echo "<a href=\"#\" id=\"checkoutOpt\" style=\"display:none;\">CHECK-OUT</a>";
	}
	?>
	