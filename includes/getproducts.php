<?php
	include('mysqli_connect.php');	
	$test = $_GET['test'];
	$matches = [];
	$q = "SELECT * FROM products";
	$r = @mysqli_query($dbc,$q);
	while($row=mysqli_fetch_array($r)) {
		$prodsId[]= $row['prod_id'];
		$prodsTags[] = $row['tags'];
	}	
	for($i=0;$i<count($prodsId);$i++) {
		if(stripos($prodsTags[$i],$test)!==false) {
			$matches[] = $prodsId[$i];
		}
	}
	$look = stripos($prodsTags[0],$test);
	echo json_encode($matches);
?>
