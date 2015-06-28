<?php
	include('includes/mysqli_connect.php');
	$id = $_GET['prod_id'];
	$q="SELECT * FROM products WHERE prod_id = $id";
	$r=mysqli_query($dbc,$q);
	$fields = ['prod_title','price','colors','fiber','itemDesc','care','sizing','measure','code','tags'];
	$stats = [];
	while($row = mysqli_fetch_array($r)) {
		foreach($fields as $field) {
			$stats[$field] = utf8_encode($row[$field]);
		}
	}
	$curTitle = $stats['prod_title'];
	$curImgs = array_diff(scandir('products/'.$curTitle),array('.','..','small'));
	$stats['imgs'] = $curImgs;
	echo json_encode($stats);
?>
