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
    $sCPass = escape($_POST['cpass']);
    $sEmail = escape($_POST['email']);
    $iGender = (int)$_POST['gender'];

    $sErrors = '';
    if (strlen($sLogin) >= 1 and strlen($sLogin) <= 25) {
        if (strlen($sPass) >= 1 and strlen($sPass) <= 25) {
            if (strlen($sEmail) >= 1 and strlen($sEmail) <= 55) {
                if ($sPass == $sCPass) {
                    if (ereg('^[a-zA-Z0-9\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $sEmail)) {
                        if ($iGender == '1' xor $iGender == '0') {
                             //insert query here marz 
							 //$iGender = (string)$iGender;
							 //$insquery = pg_query($DBConnection->conn, "INSERT INTO \"User\" (uname,pword,email,gender) VALUES ('$sLogin','$sPass','$sEmail','$iGender')");
							 echo strtr(file_get_contents('templates/step3.html'), array());
                                exit;
                             } else {
                            $sErrors = 'Gender is wrong';
                        }
                    } else {
                        $sErrors = 'Email is wrong';
                    }
                } else {
                    $sErrors = 'Passwords are not the same';
                }
            } else {
                $sErrors = 'Address email is too long';
            }
        } else {
            $sErrors = 'Password is too long';
        }
    } else {
        $sErrors = 'Login is too long';
    }
}

// unset validation code if exists
unset($_SESSION['valdiation_code']);

// draw registration page
echo strtr(file_get_contents('templates/signup_page.html'), array());

// extra useful function to make POST variables more safe
function escape($s) {
    //return mysql_real_escape_string(strip_tags($s)); // uncomment in when you will use connection with database
    return strip_tags($s);
}