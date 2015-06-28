<?php

include('mysqli_connect.php');
$hit = $_GET['hit'];
$q = "SELECT * FROM products WHERE prod_id=$hit";
$r = @mysqli_query($dbc,$q);
while($row=mysqli_fetch_array($r)){
		$prodsTitle[] = $row['prod_title'];
		$prodsId[] = $row['prod_id'];
		$prodsPrice[]=$row['price'];
		$prodsSold[]=$row['sold'];
}
$prodInfo[] = $prodsId[0];
$prodInfo[] = $prodsTitle[0];
$prodInfo[] = $prodsPrice[0];
$prodInfo[] = $prodsSold[0];
echo json_encode($prodInfo);
?>
