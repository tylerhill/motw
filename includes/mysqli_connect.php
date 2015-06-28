<?php
	DEFINE('DB_USER','mythofthewes');
	DEFINE('DB_PASSWORD','dij3pem3');
	DEFINE('DB_HOST','mythofthewest.db');
	DEFINE('DB_NAME','test');
	$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)OR die ('this did not work'.mysqli_connect_error());
?>
