</div>
	<div class="slideshow">
		<img src="images/bg1.jpg" id="bg1"/>
		<img src="images/bg2.jpg" id="bg2"/>
		<img src="images/bg3.jpg" id="bg3"/>
		<img src="images/bg4.jpg" id="bg4"/>
		<img src="images/bg5.jpg" id="bg5"/>
		<img src="images/bg6.jpg" id="bg6"/>
		<img src="images/bg7.jpg" id="bg7"/>
		
	</div>
	
										<!-- CUSTOMER FUNCTIONALITIES-->	
	<!-- SIGN IN -->
		<div id="signinform">
			<img src="images/closelabel.png" id="closesign" />
			<form method="post" name="logForm" onsubmit="return valsignin('signresult');" action="login.php">
					<br/><div class="bodytext">Username &nbsp;<input type="text" name="username" id="username" />
					<br/><br/>Password &nbsp;<input type="password" name="password" id="password"/>
					<br/><br/><input type="submit" value="Log-in" id= "log" name="login"/> </div>
			<?php if(isset($_SESSION['logerr'])){ echo "Username and Password does not match <input type=\"hidden\" id=\"logerrhid\"  value=\"1\" />";
			unset($_SESSION['logerr']);}else{echo "<input type=\"hidden\" id=\"logerrhid\"  value=\"2\" />";}?>
			</form>
		</div>
	
	<!-- REGISTER -->
		<div id="regform">	
			<img src="images/closelabel.png" id="close" />
			<table id="regtable">
				
				<form method="post" name="regForm" onsubmit="return validate_all('results');" action="register.php">
					
					<tr>
						<td class="bodytext">Username</td>
						<td><input type="text" name="uname" maxlength="25" id="uname" /></td>
						<td rowspan="6"><div id="results"></div></td>
					</tr>
					<tr>
						<td class="bodytext">First Name</td><td><input type="text" name="firstname" id="firstname" maxlength="25" /></td>
					</tr>
					<tr>
						<td class="bodytext">Last Name</td>
						<td><input type="text" name="lastname" id="lastname" maxlength="25" /></td>
					</tr>
					<tr>
						<td class="bodytext">Male <input type="radio" name="gender" value="male" checked="true"></td>
						<td class="bodytext">Female <input type="radio" name="gender" value="female"><br /></td>
					</tr>											
					<tr>
						<td class="bodytext">Address </td>
						<td><input type="text" name="address" id="address"  maxlength="60" /></td>
					</tr>
					<tr>
						<td class="bodytext">Email </td>
						<td><input type="text" name="email" maxlength="25" id="email"  maxlength="25"  /></td>
					</tr>
					<tr>
						<td class="bodytext">Password </td>
						<td><input type="password" name="pword" maxlength="25" id="pword" /></td>
						<td><div id="pass_result"></div></td>
					</tr>
					<tr>
						<td class="bodytext">Retype Password </td>
						<td><input type="password" name="signupretypepassword" id="repassword"  /></td>
					</tr>
					<tr>
						<td><input type="submit" value="Register" name="register"/></td>
					</tr>
					</div>
				</form>	
			</table>				
		</div>
		<!-- ABOUT THE HOTEL -->
		<div id="aboutatalia">
			<img src="images/logo.jpg" id="ataliaphoto"/>
			<div id="abouttext" > Hotel Atalia provides an authentic and contemporary experience for guests worldwide. Explore our hotel 
			and the smart design, thoughtful amenities and innovative dining options that make us a global leader in hospitality. </div>
			<div id="exlink"> &raquo; Learn More.. </div>
        </div>
		<!-- ROOM RESERVATION -->
		<div id="reserveroom">
				<table id="reservetable">
						<form name="resForm" id="resForm" onsubmit="return validate_reservation('resresult');" action="reserveroom.php" method="post">
							<tr>
							<td class="bodytext">Arrival:</td>
							<td class="bodytext">Departure:</td>
							<td class="bodytext">Room:</td>
							</tr>
							<tr>
							<td><input type="date" name="arrival" id="arr"/></td>
							<td><input type="date" name="departure" id="dep" /></td>
							<td><select name='roomnumber'>
							<?php while($rooms = pg_fetch_row($resquery)){echo "<option value = '$rooms[0]'>$rooms[0]</option>";}?>
							</select></td>							
							<td><input type="submit" value="Submit Reservation" id="reserve" name="reserve"/></td></tr>
							<?php if(isset($_SESSION['reserved'])) echo "<script>alert(\"Room {$_SESSION['reserved']} has been reserved!\");</script>"; 
							unset($_SESSION['reserved']);?>
						</form>
					</table>
					<div id="resresult"></div>
				
		</div>
		<!-- AVAIL SERVICES -->
		<div id="listofservices">
               <?php
                    $show = pg_query($DBConnection->conn, "SELECT * FROM services where servicename not like 'Room Charge'");
                    $count = pg_num_rows($show);
                    
                    echo "<table id=\"servtable\">";
                    for($i=0;$i<$count;$i++){
                         echo "<tr class=\"cell\">";
                         $row = pg_fetch_array($show);
                         echo "<td class=\"cell\" width=\"150px\">".$row['servicename']."</td>";
                         echo "<td class=\"cell\" width=\"150px\">".$row['servicecharge']."</td>";
                         // use link instead of button
                         echo "<td class=\"cell\" width=\"200px\"><a id=\"service\" href='services.php?servicename=".$row['servicename']."'>Avail Service</a></td>";
                         echo "</tr>";
                    }
                    echo "</table>";
					if(isset($_SESSION['availed'])) echo "<script>alert(\"{$_SESSION['availed']} availed!\");</script>"; 
					unset($_SESSION['availed']);
					if(isset($_SESSION['not'])) echo "<script>alert(\"User cannot avail {$_SESSION['not']}!\");</script>"; 
					unset($_SESSION['not']);
					
               ?>
		</div>
		
		<!-- RECENT ACTIVITIES -->
		<div id="listofactivities">
               <?php
					$roomNumber = pg_query($DBConnection->conn, "SELECT roomnumber,roomstatus FROM \"room\" WHERE (username='$_SESSION[name]')"); //retrieve room number using customer's username
					$row = pg_fetch_assoc($roomNumber);
					$num = $row['roomnumber'];
					$rs = $row['roomstatus'];
					
					if($rs == 'occupied'){
						$view = pg_query($DBConnection->conn, "SELECT serviceavailed,dateavailed FROM \"bill\" WHERE (dateavailed=current_date AND roomnumber='$num')");
						$count = pg_num_rows($view);
						
						echo "<table id=\"recent\">";
						echo "<tr class=\"cell\"><th class=\"cell\">Service Availed</th><th class=\"cell\">Date Availed</td></th>";
						for($i=0;$i<$count;$i++){
							 echo "<tr class=\"cell\">";
							 $row = pg_fetch_array($view);
							 echo "<td class=\"cell\" width=\"150px\">".$row['serviceavailed']."</td>";
							 echo "<td class=\"cell\" width=\"150px\">".$row['dateavailed']."</td>";
							 echo "</tr>";
						}
						echo "</table>";
					}else{
						echo "<div class=\"bodytext\" id=\"chtext\">User not checked-in or has no reservation</center></div>";
					}
                    
               ?>
		</div>
		<!-- BILLING RECORDS-->
		<div id="billingrecords">
			<!-- CUSTOMER VIEWS BILLS HERE	-->
			<table id="billtable"><?php
				$roomNumber = pg_query($DBConnection->conn, "SELECT roomnumber FROM \"room\" WHERE (username='$_SESSION[name]' and roomstatus='occupied')"); //retrieve room number using customer's username
				
				
			//	while($row = pg_fetch_assoc($roomNumber)){
					$row = pg_fetch_assoc($roomNumber);
					$num = $row['roomnumber'];//assign roomnumber to a variable
			//	}
			
				if($num!=NULL){
				$result = pg_query($DBConnection->conn, "SELECT * FROM \"bill\" WHERE roomnumber='$num'"); //retrieves rows from table bills
						
				echo "<thead>
					<tr class=\"cell\">
						<th class=\"cell\">Room Number</th>
						<th class=\"cell\">Amount</th>
						<th class=\"cell\">Service Availed</th>
						<th class=\"cell\">Date Availed</th>
					</tr>
					</thead><tbody>";
				while($row = pg_fetch_array($result)){
					echo 
						"<tr class=\"cell\">
						<td class=\"cell\">".$row['roomnumber']."</td>
						<td class=\"cell\">".$row['amount']."</td>
						<td class=\"cell\">".$row['serviceavailed']."</td>
						<td class=\"cell\">".$row['dateavailed']."</td>
						</tr>";
				}
					echo"</tbody>";
					
					/*this part computes for the total bill*/
				$amount = pg_query($DBConnection->conn, "SELECT amount FROM \"bill\" WHERE roomnumber='$num'");	//retrieves the column 'amount from the database'
				$total=0;
				while($row = pg_fetch_assoc($amount)){
				$total = $total + $row['amount'];//the numbers obtained from the column 'amount' in the database accumulates in the variable total
				}
				echo "<tr><td></td><td></td><td class=\"cell\">Total</td><td class=\"cell\">".$total."</td></tr>";
					
				/*this part computes for the total bill*/
				}
				else{
						echo "<div class=\"bodytext\">User not checked-in or has no reservation</div>";
					}
				
		?>
			</table>
			<br/>
			<br/>
		</div>
												<!-- ADMIN FUNCTIONALITIES-->
		<!-- HOTEL STATISTICS -->
												
		<div id="hotelstatForm"> 
			<?php  
					$q1 = pg_num_rows(pg_query($DBConnection->conn, "SELECT * FROM \"room\" WHERE roomstatus = 'vacant' ORDER BY roomnumber"));
					$q2 = pg_num_rows(pg_query($DBConnection->conn, "SELECT * FROM \"room\" WHERE roomstatus = 'reserved' ORDER BY roomnumber"));
					$q3 = pg_num_rows(pg_query($DBConnection->conn, "SELECT * FROM \"room\" WHERE roomstatus = 'occupied' ORDER BY roomnumber"));
			?>		
			<input type="hidden" id="vacantc" value="<?php echo $q1; ?>" />
			<input type="hidden" id="reservedc" value="<?php echo $q2; ?>" />
			<input type="hidden" id="occupiedc" value="<?php echo $q3; ?>" />
				<table id="chart">
					<tr class="rcell">
						<td class="rcell">Vacant Rooms</td>
						<td class="cell"><canvas id="cnvsvacant" height="30" width="450"></canvas></td>
						<td class="rcell"><?php echo $q1; ?></td>
					</tr>
					<tr class="rcell">
						<td class="rcell">Reserved Rooms</td>
						<td class="rcell"><canvas id="cnvsreserved" height="30" width="450"></canvas></td>
						<td class="rcell"><?php echo $q2; ?></td>
					</tr>
					<tr class="rcell">
						<td class="rcell">Occupied Rooms</td>
						<td class="cell"><canvas id="cnvsoccupied" height="30" width="450"></canvas></td>
						<td class="rcell"><?php echo $q3; ?></td>
					</tr>
					<tr class="rcell">
						<td class="rcell">0</td>
						<td class="rcell">500</td>
						<td class="rcell">999</td>
					</tr>
				</table>
				<br/>
			<input type="submit" id="but" onclick="getChart();" value="See chart"/>
		</div>
		
		<!-- ROOM STATUS -->
			<div id="rmstatForm"> 
				<form name="checkroomstat" id="checkroomstat" onsubmit="getRes()" action="viewroomstat.php" method="post">
					<input type="submit" name="viewall"  id="viewall" value="All Rooms"/>
					<input type="submit" name="viewvacant" id="vacant" value="Vacant Rooms"/>
					<input type="submit" name="viewreserved" id="reserved" value="Occupied Rooms"/>		
				</form>
			
			<div id="viewroomstatresult">
				<table id="roomquery">
					
						<?php
							if(isset($_SESSION['all'])){
								$q1 = pg_query($DBConnection->conn, "SELECT * FROM \"room\" ORDER BY roomnumber");
								echo '<tr class="cell">
						<th class="cell">Room Number</th>
						<th class="cell">Status</th>
						<th class="cell" >User</th>
						<th class="cell">Arrival Date</th>
						<th class="cell">Departure Date</th>
					</tr>';
									while($row = pg_fetch_row($q1)){
										$roomnumber = $row[0];
										$roomstatus = $row[1];
										$username = $row[2];
										$arr = $row[3];
										$dep = $row[4];
										
										echo "<tr class=\"cell\">
												<td class=\"cell\">Room: $row[0]</td>
												<td class=\"cell\">$row[1]</td>
												<td class=\"cell\">$row[2]</td>
												<td class=\"cell\">$row[3]</td>
												<td class=\"cell\">$row[4]</td>
												</tr>";
									}
							unset($_SESSION['all']);
							}
							else if(isset($_SESSION['viewvacant'])){
								$q2 = pg_query($DBConnection->conn, "SELECT * FROM \"room\" WHERE roomstatus = 'vacant' ORDER BY roomnumber");
									while($row = pg_fetch_row($q2)){
										$roomnumber = $row[0];
										$roomstatus = $row[1];
										$username = $row[2];
										$arr = $row[3];
										$dep = $row[4];
				
										echo "<tr class=\"cell\">
											<td class=\"cell\">Room: $row[0]</td>
											<td class=\"cell\">$row[1]</td>
											<td class=\"cell\">$row[2]</td>
											<td class=\"cell\">$row[3]</td>
											<td class=\"cell\">$row[4]</td>
											</tr>";
									}
							unset($_SESSION['viewvacant']);
							}
							else if(isset($_SESSION['viewreserved'])){
								$q3 = pg_query($DBConnection->conn, "SELECT * FROM \"room\" WHERE roomstatus = 'reserved' OR roomstatus = 'occupied' ORDER BY roomnumber");
									while($row = pg_fetch_row($q3)){
										$roomnumber = $row[0];
										$roomstatus = $row[1];
										$username = $row[2];
										$arr = $row[3];
										$dep = $row[4];
									
										echo "<tr class=\"cell\">
											<td class=\"cell\">Room: $row[0]</td>
											<td class=\"cell\">$row[1]</td>
											<td class=\"cell\">$row[2]</td>
											<td class=\"cell\">$row[3]</td>
											<td class=\"cell\">$row[4]</td>
										</tr>";
									}
							unset($_SESSION['viewreserved']);
							}
							
						?>
				</table>
			</div>
			</div>
			
		<!-- ADD/DELETE SERVICE -->
		
			<div id="serviceForm">
				<?php
				   $show = pg_query($DBConnection->conn, "SELECT * FROM services");
				   $count = pg_num_rows($show);
                    
					echo "<table id=\"servicequery\" align=\"center\" border=\"1\">";
					echo "<thead><tr class=\"cell\"><th> Service name </th><th  align=\"center\"> Amount </th></tr></thead>";
					
					for($i=0;$i<$count;$i++){ // show all services currently in the database
						echo "<tr class=\"cell\">";
						$row = pg_fetch_array($show);
						echo "<td align=\"center\" width=\"150px\">".$row['servicename']."</td>";
						echo "<td align=\"center\" width=\"150px\">".$row['servicecharge']."</td>";
						echo "</tr>";
					} 
               
					echo "<tr class=\"cell\"><form name=\"addservice\" action=\"addelservice.php\" method=\"POST\" onsubmit=\"return validateForm()\">";
					// ask for the service name and service charge to be added or removed from the database
					echo "<td><input type=\"text\" name=\"servicename\" placeholder=\"Service name\" /></td>";
					echo "<td><input type=\"text\" name=\"servicecharge\" placeholder=\"Service charge\" /></td>";
					echo "</tr>";
					echo "</table>";
					echo "<table id=\"servbutton\">";
					echo "<tr><td><input type=\"submit\" name=\"addservice\" value=\"Add Service\"/></td>";
					echo "<td><input type=\"submit\" name=\"delservice\" value=\"Remove Service\"/></td></tr>";
					echo "</form>";
					echo "</table>";
					if(isset($_SESSION['serviceadded'])) 
						echo "<script>alert(\"{$_SESSION['serviceadded']} was added to services!\");</script>"; 
					unset($_SESSION['serviceadded']);
					
					if(isset($_SESSION['servicenotadded'])) 
						echo "<script>alert(\"{$_SESSION['servicenotadded']} already in services!\");</script>"; 
					unset($_SESSION['servicenotadded']);
               
					if(isset($_SESSION['servicedeleted'])) 
						echo "<script>alert(\"{$_SESSION['servicedeleted']} removed from services!\");</script>"; 
					unset($_SESSION['servicedeleted']);
					
					if(isset($_SESSION['noservice'])) 
						echo "<script>alert(\"{$_SESSION['noservice']} not in services!\");</script>"; 
					unset($_SESSION['noservice']);
				?>  
			</div>
			
		<!-- BILL CUSTOMER -->
			<div id="adminbillingform">				
				<form action="billcustomer.php" method="post" onsubmit="return validate_bill('div_bill');" name="billcustomer" id="billcustomer">
				
				<?php
					if (isset($_GET['error'])){	$error= $_GET['error'];if($error==1) echo '<center><div class="bodytext">Room not occupied.</div></center>';}
				
					
					
					
					
					
				?>
					
					<table id="adminbilling">
					
						<tr>
							<td class="bodytext">Room Number: </td>
							<td><input type="text" id="room_number" placeholder="Room Number" name="room_number"/></td>
						</tr>
						<tr>
							<td class="bodytext">Service Availed: </td>
							<td><?php
									$services = pg_query($DBConnection->conn, "SELECT * FROM services");
										echo"<select name='serviceid'>";
										while($row = pg_fetch_array($services)){
											echo " <option value=".$row['serviceid'].">".$row['servicename']."</option>";
										}
										echo"</select>";
							?>
							</td>
						</tr>
						<tr>
							<td class="bodytext">Date Availed: </td>
							<td><input type="date" name="date_availed" placeholder="Date Availed" id="date_availed"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input name="submit" type="submit" value="Bill customer"/></td>
							<td></td>
						</tr>
					</table> 
					
					<div id="div_bill" style="color:red"></div>
					
				</form>
				
			<?php
				if(isset($_SESSION['billed'])) 
					echo "<script>alert(\"{$_SESSION['billed']} has been added to room {$_SESSION['roomnumber']} 's bills and expenses!\");</script>"; 
					unset($_SESSION['billed']);
			?>
			
			</div>
		<!-- CHECK-IN -->
		<div id="checkinForm">
				<!--Form (Checkin with/without reservation)-->
				<form name="startform" id= "startform" action="checkin.php" method="post">
					<input type="submit" name="reserve"  value="Check in with reservation"/>
					<input type="submit" name="walk" value="Check in without reservation"/><br/>
				
				<!--print error-->
					<?php 
						$error= $_GET['error'];
							if ($error==1) echo '<div class=\"bodytext\">The customer has not reserved the specified room number</div>';	
							else if($error==2) echo '<div class=\"bodytext\">The user is currently checked in';
					?>
				</form>
				<!--end of form-->
				
				<!--checkin with reservation-->
				<?php 
					if(isset($_SESSION['res'])){ 							
				?>
				<center>
					<?php
						$query = "select * from room where roomstatus='reserved'";
						$result = pg_query($DBConnection->conn, $query);
						if(pg_fetch_row($result)!=null){
						echo "<table id=\"couttable\">";
							//print list of occupied rooms
								$query = "select * from room where  roomstatus='reserved'";
								$result = pg_query($DBConnection->conn, $query);
								echo "<br/>
									<tr>
										<th class=\"icell\">Customer</th> 
										
										<th class=\"icell\">Room No.</th>
									</tr>";
							while($row=pg_fetch_row($result)){
								echo "<tr>
										<td class=\"icell\">$row[2]</td>
										
										<td class=\"icell\">$row[0]</td>
									</tr>";
							}
							echo "</table>";  ?>
							
								<br />


						<form method="post" name="checkinformwithres" id= "checkinOpt" onsubmit="return validate_checkin_withres('walkin_res');" action="checkin.php">	
							<input type="text" name="username" id="username1" placeholder="Username" maxlength="25" /> <br/>
							<input type="text" name="roomnumber" id="roomnumber1" placeholder="Reserved Room Number" maxlength="3" /><br /><br/>
							<input type="submit" name="find" value="Check In" /> <br />	
							<div id="walkin_res"></div>	
					</form>
					
							<?php }
							else echo "No reserved rooms";
							?>	
						
				
				</center>
				
			
				<?php
		
		unset($_SESSION['res']); 
					
					
				}

				
				else if (isset($_SESSION['nores']))
				{
				?>	
			
					<form method="post" name="checkinform" id= "checkinOpt" onsubmit="return validate_walkin('walkin_res');"  action="checkin.php">	
						<center>
							<input type="text" name="firstname" id="firstname1" placeholder="First Name" maxlength="25" /> <br />
							<input type="text" name="lastname" id="lastname1" placeholder="Last Name" maxlength="25" /> <br />
							<input type="text" name="address" id="address1" placeholder="Address" maxlength="50" /> <br />
							<input type="text" name="email" id="email1" placeholder="Email Address" maxlength="55" /> <br />
							<input type="text" name="contact" id="contact" placeholder="Contact Number" maxlength="11" /> <br />
							<input type="text" name="room" id="room" placeholder="Room Number" maxlength="3" /> <br />
							<input type="text" name="arrdate" id="arrdate" placeholder="Arrival Date" maxlength="10" /> <br />
							<input type="text" name="depdate" id="depdate" placeholder="Departure Date" maxlength="10" /> <br />
							<input type="submit" name="start" value="Check In" "/>
							<input type="submit" name="cancel" value="Cancel"/><br />	
								<div id="walkin_res"></div>	
						</center>					
					</form>	
			
				<?php 
			
					unset($_SESSION['nores']); 
				}
					
				?>
				
				<?php
					
					if (isset($_SESSION['checkin2'])){
						echo "<script>alert('Check In Successful');</script>"; 
						unset($_SESSION['checkin2']);
					}
				?>
			</div>
	<!-- CHECK OUT-->
			<center>
				<div id="checkoutForm">
					<form class="customerlist" method="POST">
						<table id="couttable">
							<?php //print list of occupied rooms
								$query = "select * from room where  roomstatus='occupied'";
								$result = pg_query($DBConnection->conn, $query);
								echo "<br/>
									<tr>
										<th class=\"icell\">Customer</th> 
										<th class=\"icell\">Room Status</th>
										<th class=\"icell\">Room No.</th>
									</tr>";
							while($row=pg_fetch_row($result)){
								echo "<tr>
										<td class=\"icell\">$row[2]</td>
										<td class=\"icell\">$row[1]</td>
										<td class=\"icell\">$row[0]</td>
									</tr>";
							}
							//end of list 
							?>	
						</table>
	
					</form> 
					<form method="post" name="checkoutform" id= "checkoutOpt" onsubmit="return validate_checkout('checkout_res');"  action="checkout.php">
						<div id="checkout_res"></div>	
							<input type="text" name="outroom" id="outroom" placeholder="Room Number" maxlength="3" />
							<input type="submit" name="out" value="Check Bill and Check Out" /><br/>		
					</form>
				<?php 
					if (isset($_GET['error']))
						$error= $_GET['error'];
					if ((isset($_GET['error']))&&$error==1) 
						echo 'No bills for the chosen room. Please check again';	
					else if ((isset($_GET['error']))&&($error==0&&isset($_GET['outroom']))){
						echo "<table>";
							$query2 = "select * from bill where roomnumber= {$_GET['outroom']}";
							$result2 = pg_query($DBConnection->conn, $query2);
					if(pg_num_rows($result2)!=0){
						echo "<tr class=\"icell\"><th class=\"icell\">Date Availed</th> <th class=\"icell\">Service Availed</th><th class=\"icell\">Amount</th></tr>";
						while($row=pg_fetch_row($result2)){
								echo "<tr class=\"icell\"><td class=\"icell\">$row[3]</td><td class=\"icell\">$row[2]</td><td class=\"icell\">$row[1]</td></tr>";
								echo '<br />';
						}	
						$roomNumber = pg_query($DBConnection->conn, "SELECT roomnumber FROM \"room\" WHERE (roomnumber='$_GET[outroom]')");
						$row = pg_fetch_assoc($roomNumber);
						$num = $row['roomnumber'];//assign roomnumber to a variable
						$amount = pg_query($DBConnection->conn, "SELECT amount FROM \"bill\" WHERE (roomnumber='$num')");	//retrieves the column amount from the database'
						$total=0;
							while($row = pg_fetch_assoc($amount)){
								$total = $total + $row['amount'];//the numbers obtained from the column 'amount' in the database accumulates in the variable total
							}
							echo "Total =".$total;
							echo "<br/><tr></tr>
							<tr></tr>
							<tr>
								<td>
									<form method= 'post' action='confirmCheckout.php?outroom=".$_GET['outroom']."'>
									<input type= 'submit' name='confirmOut' value='Confirm Check Out?'>
									</form>
								</td>
								<td>
									<form method= 'post' action='index.php?error=0'>
									<input type= 'submit' name='cancelOut' value='Cancel'>
									</form>
								</td>
							</tr>";
					}

					echo "</table>";
					} 
				?>
		</div>
		</center>
		
		<div id="darkoverlay"></div>
	</body>
</html>
<?php ob_end_flush(); ?>