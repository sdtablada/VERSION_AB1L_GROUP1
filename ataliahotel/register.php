<?php
session_start();
if (isset($_POST['register'])) {

    $username = $_POST['uname'];
    $password = $_POST['pword'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$type = 'customer';

    if ((strlen($username) >= 1 and strlen($username) <= 25) and (strlen($password) >= 1 and strlen($password) <= 25)
	and (strlen($email) >= 1 and strlen($email) <= 55) and (strlen($firstname) >= 1 and strlen($firstname) <= 25)
	and (strlen($lastname) >= 1 and strlen($lastname) <= 25)){
	$insquery = pg_query($DBConnection->conn, "INSERT INTO \"user\" (username,password,email,gender,firstname,lastname,address,type) VALUES ('$username','$password','$email','$gender','$firstname','$lastname','$address','$type')");   
	header("location:index.php");
	} 
}






?>