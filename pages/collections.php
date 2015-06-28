<!DOCTYPE html>
<html>
<head>
<title>Collections  - MYTH OF THE WEST</TITLE>
<link href='../style.css' rel='stylesheet' type='text/css' />
<script src='/../includes/jquery.js'></script>
<script src='/../includes/collecHover.js'></script>

</head>
<body>
<div id='centerCol'>
<header>
<div id='brand'>
<a href='/../index.php'><img src='/../weedcroplrg.png' id='logo' /></a>
</div>
<img src='/../banner.png' id='banner' />
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
	$collecDir = '../collections';
	$seasons = scandir($collecDir);
	$seasons = array_diff($seasons,array('..','.'));
	sort($seasons);
	foreach($seasons as $season) {
		echo "<div class='prodthumb'><a href='season.php?season=$season'><img src='/../collections/$season/thumb.jpg' class='prodthumb'/><p class='prodthumb' id=''></p><p class='prodprice'>$season</p></a></div>";
	}
?>
</main>
</div>
</body>
</html>
