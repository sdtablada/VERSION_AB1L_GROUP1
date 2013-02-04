<?php
//include("DBConnection.class.php");
//$DBConnection = new DBConnection();

// set error reporting level
if (version_compare(phpversion(), '5.3.0', '>=') == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);

session_start();
if (isset($_POST['submit'])) {

    $sLogin = escape($_POST['login']);
    $sPass = escape($_POST['pass']);

    $sErrors = '';
    if (strlen($sLogin) > 0 ) {
        if (strlen($sPass) > 0 ) {
             //check if there is an existing User with username = $sLogin and password = $sPass
			 //$selquery = pg_query($DBConnection->conn, "SELECT uname, pword FROM User WHERE uname = \'$sLogin\' AND pword = \'$sPass\'");
			 //count number of rows returned; if rows > 0, the User exists. alam mo na yan marz edit na lang natin yung query pag may 
			 //syntax error kase di ko pa natry. pero yan yung tamang idea dyan 
			 //if(pg_num_rows($selquery)){
			 echo strtr(file_get_contents('templates/step3.html'), array());
             exit;
			 //}
		//else 
			//$sErrors = 'Invalid Username/Password';
        } else {
            $sErrors = 'Invalid/Missing Password';
        }
    } else {
        $sErrors = 'Invalid/Missing Username';
    }
}

// draw registration page
echo strtr(file_get_contents('templates/login_page.html'), array());

// extra useful function to make POST variables more safe
function escape($s) {
    //return mysql_real_escape_string(strip_tags($s)); // uncomment in when you will use connection with database
    return strip_tags($s);
}