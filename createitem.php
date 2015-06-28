<?php
	include('/includes/mysqli_connect.php');
	$title = mysqli_real_escape_string($dbc,$_POST['prod_title']);
	$itemDesc = mysqli_real_escape_string($dbc,$_POST['itemDesc']);
	$price =    mysqli_real_escape_string($dbc,$_POST['price']);
	$colors =   mysqli_real_escape_string($dbc,$_POST['colors']);
	$fiber =    mysqli_real_escape_string($dbc,$_POST['fiber']);
	$care =     mysqli_real_escape_string($dbc,$_POST['care']);
	$sizing =   mysqli_real_escape_string($dbc,$_POST['sizing']);
	$measure =  mysqli_real_escape_string($dbc,$_POST['measure']);
	$q = "INSERT INTO products (prod_title,itemDesc,price,colors,fiber,care,sizing,measure) VALUES ('$title','$itemDesc','$price','$colors','$fiber','$care','$sizing','$measure')";
	$r = @mysqli_query($dbc,$q);


?>
