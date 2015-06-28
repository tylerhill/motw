<!DOCTYPE html>
<html>
<head>
<?php
include('../includes/mysqli_connect.php');
$curProd = $_GET['PROD'];
$q = "SELECT * FROM products WHERE prod_id=$curProd";
$r = @mysqli_query($dbc,$q);
while ($row = mysqli_fetch_array($r)) {
	$title = $row['prod_title'];
	$itemDesc = $row['itemDesc'];
	$price = $row['price'];
	$colors = $row['colors'];
	$fiber = $row['fiber'];
	$care = $row['care'];
	$sizing = $row['sizing'];
	$measure = $row['measure'];
	$measure = nl2br($measure);
	$code = $row['code'];
}
$prodDir = '../products/'.$title;
$prodImgs = array_diff(scandir($prodDir),array('..','.','small'));
sort($prodImgs);

echo "<title>$title</TITLE>";
?>
<link href='../style.css' rel='stylesheet' type='text/css' />
<script src='/../includes/jquery.js'></script>
<script type='text/javascript'>
	window.onload = function() {
		var curProdView;
		curProdView = document.getElementById('curProdView');
		var newProdView;
		var prodViewThumbs = document.getElementsByClassName('prodImg');
		var zoomLoaded = false;
		var imgHover;
		var slide=false;
		var zoomImg;
		var mouse  = {x:0,y:0};
		var zoomOffsetX; 
		var zoomOffsetY; 
		var zoomMouseX;
		var zoomMouseY;
		var bigHeight;
		var smallHeight;
		var bigWidth;
		var smallWidth;
		var prodInfoX;
		var prodInfoY;
		
		var centerCol = document.getElementById('centerCol');
		var colOffsetX = centerCol.offsetLeft;
		var viewer;
		var viewerOffset;
		viewer = document.getElementById('prodViewer');
		var infoHeight;
		var mainOffsetY;
		var topMove;
		var leftMove;
		var zoomCut=document.createElement('div');
		zoomCut.id='zoomCut';
		var cutHeight;
		for (i=0;i<prodViewThumbs.length;i++) {
			prodViewThumbs[i].addEventListener('click',function(){
				newProdView = this.src;
				curProdView.src = newProdView;
			});
		}
		$('img#curProdView').mouseenter(function(){
				
				viewerHeight = viewer.clientHeight;
			//	prodInfoY = document.getElementById('prodInfo').clientHeight;
			//	$('div#prodInfo').css('height',viewerHeight);
				imgHover = $(this).attr('src');
				zoomImg = document.createElement('img');
				zoomImg.id = 'zoomImg';
				imgHover = imgHover.replace('small\/','');
				zoomImg.src = imgHover;
				zoomCut.style.height = viewerHeight + 'px';
				prodInfoY = document.getElementById('prodInfo').clientHeight;
				$('div#prodInfo').children().css({'visibility':'hidden'});
				$('div#prodInfo').prepend(zoomCut);
				$('div#zoomCut').append(zoomImg);
				
			});
		$('img#curProdView').mouseleave(function(){
			$('div#prodInfo').children().css({'visibility':'visible'});
			$('img#zoomImg').remove();
			$('div#zoomCut').remove();
		});
		document.addEventListener('mousemove',function(e){
					mainOffsetY = document.getElementsByTagName('main');
					mainOffsetY = mainOffsetY[0].offsetTop;
					mouse.x = e.pageX;
					mouse.y = e.pageY;
					viewerOffset = viewer.getBoundingClientRect();	
					zoomOffsetX = viewerOffset.left;
					zoomOffsetY = viewerOffset.top;
					//zoomOffsetX = viewer.offsetLeft + colOffsetX;
					//zoomOffsetY = zoomOffsetY + mainOffsetY;
					zoomMouseX = mouse.x - zoomOffsetX;
					zoomMouseY = mouse.y - zoomOffsetY;
					bigHeight = document.getElementById('zoomImg').clientHeight;
					smallHeight = document.getElementById('curProdView').clientHeight;
					bigWidth = document.getElementById('zoomImg').clientWidth;
					smallWidth = document.getElementById('curProdView').clientWidth;
					prodInfoX = document.getElementById('prodInfo').clientWidth;
					prodInfoY = document.getElementById('prodInfo').clientHeight;
					topMove = (zoomMouseY*bigHeight)/smallHeight;
					leftMove = (zoomMouseX*bigWidth)/smallWidth;
					//topMove = topMove - (prodInfoY/2);
					leftMove = leftMove - (prodInfoX/2);
					cutHeight = document.getElementById('zoomCut').clientHeight;
					if(topMove<bigHeight-cutHeight){
					zoomImg.style.top = -topMove + 'px';
					}
					if(leftMove<bigWidth-smallWidth&&leftMove>0){
					zoomImg.style.left = -leftMove + 'px';
					}
			
		});





	}
</script>
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
		echo "\r\n<a href='/pages/$page.php' class='navLink'>$pageTitle</a>";
	}
?>
</nav>
</header>
<main>
<div id='prodViewer'>
<?php

echo "<img src='/$prodDir/small/$prodImgs[0]' id='curProdView' />";
echo "<span id='prodViewThumbs'>";
foreach ($prodImgs as $prodImg) {
	echo "<img src = '/$prodDir/small/$prodImg' class='prodImg' />";
}
echo "</span>";
?>
</div>
<div id='prodInfo'>
<?php
echo "
	<span id='titleCont'><h3 class='prodStat' id='prod_title'>$title</h3>

	
	</span><br />
<span class='paypal'>
<label>Price:</label>
<p class='prodStat' id='price'> \$$price.00</p>
$code
</span><br />
<label>Color:</label>
<p class='prodStat' id='colors'>$colors</p><br />
<label>Fiber:</label>
<p class='prodStat' id='fiber'>$fiber</p><br />
<label>Care:</label>
<p class='prodStat' id='care'>$care</p><br />
<label>Sizing Information:</label>
<p class='prodStat' id='sizing'>$sizing</p><br />
<label>Garment Measurements (Laid Flat):</label><br />
<p class='prodStat' id='measure'>$measure</p><br />
<label>Description:</label>
<p class='prodStat' id='itemDesc'>$itemDesc</p>
";
?>
</div>
</main>
</div>
</body>
</html>
