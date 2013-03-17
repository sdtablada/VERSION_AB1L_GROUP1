<?php
	
	session_start();
	session_unset();
	session_destroy();
	
	header("location:index.php?error=0");
	exit();
?>
