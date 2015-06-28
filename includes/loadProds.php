<?php
include('mysqli_connect.php');
$q = "SELECT * FROM products";
$r = @mysqli_query($dbc,$q);
while($row=mysqli_fetch_array($r)){
	$prodsId[] = $row['prod_id'];
}
echo json_encode($prodsId);
?>
