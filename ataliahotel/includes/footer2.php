
        </div>
		<div id="accomodations">
			<a href="">Room Types</a>
			<br/><a href="">Features and Amenities</a>
			<br/><a href="">Photo Gallery</a>
        </div>
		<div id="optionsForm">
		<!-- marz, trabaho mo na 'to: pag nakalogin as customer, eto ang
				ididisplay mo:	-->
			<a href="">Reserve Rooms</a>
			<br/><a href="">View Recent Activities</a>
			<br/><a href="">View Billing Records</a>
			<!-- else, ito ang ididisplay mo: -->
			<br/><a href="">Customer Check-in</a>
			<br/><a href="">Customer Check-out</a>
			<br/><a href="">Room Reservations</a>
			<br/><a href="">Hotel Statistics</a>
			<br/><a href="">Services Availed</a>
			
        </div>
		<div id="loginForm">
                <a href="logout.php">logout</a>
        </div>
		<div id="signUpForm">
            <div id="registerLabel">Register Account</div>
            <form method="post" name="regForm" onsubmit="return validateRegister()" action="register.php">
                <input type="text" name="firstName" class="txtLogin" id="firstname" value="First Name" /><br />
                <input type="text" name="lastName" class="txtLogin" id="lastname" value="Last Name" /><br />
                <input type="text" name="address" class="txtLogin" id="address" value="Address" /><br />
                <input type="text" name="signUpEmail" class="txtLogin" id="signupemail" value="E-mail" /><br />
                <input type="text" name="signUpPassword" class="txtLogin" id="signuppassword" value="Password" /><br />
                <input type="text" name="signUpRetypePassword" class="txtLogin" id="signupretypepassword" value="Re-type Password" /><br />
                <input type="submit" value="Register" name="register" class="headerbutton" id="register" />
            </form>
        </div>
        </div>
		<div id="contentbg"></div>
    </body>
</html>
