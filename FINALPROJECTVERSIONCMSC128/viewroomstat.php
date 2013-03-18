<?php

	include_once 'includes/header.php';
		
?>
       
		<?php
		if(isset($_POST['viewall'])){
			$_SESSION['all'] = 'true';
		}else if(isset($_POST['viewvacant'])){
	
			$_SESSION['viewvacant'] = 'true';
		}else if(isset($_POST['viewreserved'])){

			$_SESSION['viewreserved'] = 'true';
			}
			header("location:index.php?error=0");
		?>
	