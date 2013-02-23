
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
			<form method="post" name="logForm" action="index.php">
                <input type="text" name="username" class="txtLogin" id="username" value="Username" /><br />
                <input type="password" name="password" class="txtLogin" id="password" value="Password" /><br />
                <input type="submit" value="Login" name="login"/>    
				<div id="signup">Not a member? Sign Up!</div>
			</form>
        </div>
		<div id="signUpForm">
            <div id="registerLabel">Register Account</div>
            <form method="post" name="regForm" onsubmit="return validate_all('results');" action="register.php">
                Username:<input type="text" name="uname" class="txtLogin" maxlength="25" id="uname" /><br />
				First Name:<input type="text" name="firstname" class="txtLogin" id="firstname" maxlength="25"/><br />
                Last Name:<input type="text" name="lastname" class="txtLogin" id="lastname" maxlength="25"/><br />
				Gender:
				<input type="radio" name="gender" value="male" checked="true">Male<br>
				<input type="radio" name="gender" value="female">Female
                Address:<input type="text" name="address" class="txtLogin" id="address"  maxlength="60"/><br />
                Email:<input type="text" name="email" class="txtLogin" maxlength="25" id="email"  maxlength="25"/><br />
                Password:<input type="password" name="pword" class="txtLogin" maxlength="25" id="pword"   /><div id="pass_result"></div><br />
                Retype Password:<input type="password" name="signupretypepassword" class="txtLogin" id="repassword"  /><br />
				<input type="submit" value="Register" name="register" class="headerbutton" id="register" />
				<h3 id="results"></h3>
            </form>
        </div>
        </div>
		<div id="contentbg"></div>
    </body>
</html>
