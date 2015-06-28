<!DOCTYPE html>
<html>
<head>
<title>Shop - MYTH OF THE WEST</TITLE>
<link href='../style.css' rel='stylesheet' type='text/css' />
<script src='/../includes/jquery.js'></script>
<script src='/../includes/collecHover.js'></script>

</head>
<body>
<div id='centerCol'>
<header>
<div id='brand'>
<a href='/../index.php'><img src='/../weedcroplrg.png' id='logo' /></a>
<img src='/../banner.png' id='banner' />
</div>
<nav>
<?php 
	$pages = array('about','collections','shop','process','faq','contributors','contact');
	foreach ($pages as $page) {
		$pageTitle = strtoupper($page);
		if($page=='collections'){
		echo "\r\n<div id='collecHover'><a href='/pages/$page.php' class='navLink' id='$page'>$pageTitle</a></div>";
		} else {
		echo "\r\n<a href='/pages/$page.php' class='navLink' id='$page'>$pageTitle</a>";
		}
	}

?>
</nav>
</header>
<main>
<?php 
	include('../includes/mysqli_connect.php');
	$q = "SELECT * FROM products ORDER BY prod_id DESC";
	$r = @mysqli_query($dbc,$q);
	while($row=mysqli_fetch_array($r)) {
		$prodsTitle[] = $row['prod_title'];
		$prodsId[] = $row['prod_id'];
		$prodsPrice[]=$row['price'];
		$prodsSold[]=$row['sold'];
	}
	$render = count($prodsId);

	echo "<div id='shopNav'>";
	$shopTags = ['FW14','SS14','SS15'];
	$catTags = ['sweaters','scarves','necklaces','vests','tank-tops','halter-tops'];
	$fibTags = ['silk','wool','alpaca/silk','wool/silk','alpaca'];
	echo "<label class='tag'>SHOP</label>";
	foreach($shopTags as $link) {
		echo "<p id='$link' class='tag'>$link</p>";
	}
	echo "<label class='tag'>CATEGORY</label>";
	foreach($catTags as $link) {
		echo "<p id='$link' class='tag'>$link</p>";
	}
	echo "<label class='tag'>FIBER</label>";
	foreach($fibTags as $link) {
		echo "<p id='$link' class='tag'>$link</p>";
	}
	echo "</div>";
	echo "<div id='prodCol'>";
	for($i=0;$i<$render;$i++) {
		//$titleEncoded = rawurlencode($prodsTitle[$i]);
		$imgdir = '../products/'.$prodsTitle[$i].'/small/thumb.jpg';
		echo "<div class='prodthumb'>";
		echo "<a href='product.php?PROD=$prodsId[$i]'><img src='$imgdir' class='prodthumb' />";
		if($prodsSold[$i] == "SOLD") {
			echo "<p id='sold'>SOLD</p>";
		}
		echo "<p class='prodthumb' id='$prodsTitle[$i]'>";
		$prodsTitle[$i] = str_replace(' ',' <br />',$prodsTitle[$i]);
		echo "$prodsTitle[$i]";
		echo "</p><p class='prodprice'>\$$prodsPrice[$i].00</p></a>";
		echo "</div>";
	}
	echo "</div>";


?>
</main>
</div>
</body>
</html>
