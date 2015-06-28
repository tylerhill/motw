<?php
	$del = $_POST['del'];
	$delName = $_POST['delName'];
	$delBase = $_POST['delBase'];
	unlink($del);
	unlink('products/'.$delName.'/small/'.$delBase);
	
?>
