<?php
	include('includes/mysqli_connect.php');
	$id = $_POST['prod_id'];
	$q = "SELECT prod_title FROM products WHERE prod_id = $id";
	$r = mysqli_query($dbc,$q);
	while($row = mysqli_fetch_array($r)) {
		$title = $row['prod_title'];
	}
	echo $title;
	$kill = "products/$title";
	killDir($kill);
	$q = "DELETE FROM products WHERE prod_id = $id";	
	$r = mysqli_query($dbc,$q);

	


	function killDir($path) {
		if(is_dir($path)===true) {
			$files = array_diff(scandir($path),array('.','..'));
			foreach($files as $file) {
				killDir(realpath($path).'/'.$file);
			}
			return rmdir($path);
		}
		else if (is_file($path)===true) {
			return unlink($path);
		}

		return false;
	}
?>
