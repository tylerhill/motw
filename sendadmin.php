<?php
include('includes/mysqli_connect.php');
$item = [];


foreach($_POST as $key => $value) {
		$item[$key]=addslashes($value);
}
if($item['prod_id']) {
	$id = (int)$item['prod_id'];
	foreach($item as $stat => $value) {
		$q = "UPDATE products SET $stat='$value' WHERE prod_id = $id";
		$r = @mysqli_query($dbc,$q);
	}

} else { 
	$plodedKeys = implode(",",array_keys($item));
	$plodedVals = implode("','",$item);
	echo $plodedVals;
	$q = "INSERT INTO products ($plodedKeys) VALUES ('$plodedVals')";
	$r = @mysqli_query($dbc,$q);
	$title = $item['prod_title'];
		mkdir("products/$title");
		mkdir("products/$title/small");
}
//mkdir("products/$title/lrg");
//mkdir("products/$title/med");
?>
