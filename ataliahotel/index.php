<?php 

include("DBConnection.class.php");
$DBConnection = new DBConnection();

include_once 'includes/header.php'; 
session_start();
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sErrors = '';
    if (strlen($username) > 0 && strlen($password) > 0 ) {
        
             //check if there is an existing User with username = $sLogin and password = $sPass
			 $selquery = pg_query($DBConnection->conn, "SELECT username, password FROM \"user\" WHERE username = '$username' AND password = '$password'");
			 //count number of rows returned; if rows > 0, the User exists. alam mo na yan marz edit na lang natin yung query pag may 
			 //syntax error kase di ko pa natry. pero yan yung tamang idea dyan 
			 if(pg_num_rows($selquery)){
			 //echo strtr(file_get_contents('templates/step3.html'), array());
             include_once 'includes/footer2.php';
			 //exit;
			 }
			
		//else 
			//$sErrors = 'Invalid Username/Password';
    } 
}

	include_once 'includes/footer1.php';
?>