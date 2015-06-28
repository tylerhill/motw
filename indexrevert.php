<?php 
	$dir = './viewer';
	$shots = scandir($dir);
	$viewerCount = count($shots);
?>
<!DOCTYPE html>
<html>
<head>
	<script type='text/javascript'>
	window.onload = function() {
		var current = document.getElementById('current');
		var viewerTotal;
		var viewerCount;
		var shots;

		viewerCount = 2;
		viewerTotal = <?php echo $viewerCount; ?>;
		shots = <?php echo json_encode($shots); ?>;
		function cycle() {
			if(viewerCount<viewerTotal){
				current.src = '/viewer/' + shots[viewerCount];
				viewerCount++;
			}else{
				viewerCount=2;
				current.src = '/viewer/' + shots[viewerCount];
			}
			
		}
		window.setInterval(cycle,2000);

	}
	</script>
<link href='style.css' rel='stylesheet' type='text/css' />
<title>MYTH OF THE WEST</title>
</head>
<body>
<header>
<div id='brand'>
<img src='weedcrop.jpg' id='brand' />
<h1 id='motw0'>MYTH OF THE WEST</h1>
</div>
<nav>
<a href='dummy1.html'>Dummy1</a>
<a href='dummy2.html'>Dummy2</a>
<a href='dummy3.html'>Dummy3</a>
<a href='dummy4.html'>Dummy4</a>
<a href='dummy5.html'>Dummy5</a>
<span class='stretch'></span>
</nav>
</header>
<main>
<div id='viewer'>
<img src='dummy' id='current' />
</div>
</main>
<footer>
<div id='contact'>
<a href='contact.php'>Contact</a>
<a href='sitemap.php'>Sitemap</a>
</div>
<div id='social'>
</div>
</footer>
</body>
</html>
