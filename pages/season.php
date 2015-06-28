<?php 
	$season = $_GET['season'];
	$viewerDir = '../collections/'.$season.'/viewer';
	$slides = array_diff(scandir($viewerDir),array('..','.'));
	sort($slides);
?>
<!DOCTYPE html>
<html>
<head>
<?php
echo "<title>$season - MYTH OF THE WEST</TITLE>";
?>
<link href='../style.css' rel='stylesheet' type='text/css' />
<script src='../includes/jquery.js' type='text/javascript'></script>
<script type='text/javascript'>
window.onload = function() {
	if(window.jQuery) {
		var slides = <?php echo json_encode($slides); ?>;
		var season = '<?php echo $season; ?>';
		var lookLeft = document.createElement('img');
		lookLeft.id = 'lookLeft';

		var lookRight = document.createElement('img');
		lookRight.id = 'lookRight';
		
		var lookBook = document.getElementById('lookBook');

		var leftPage = document.getElementById('leftPage');
		var rightPage = document.getElementById('rightPage');
		leftPage.appendChild(lookLeft);
		rightPage.appendChild(lookRight);

		var i = 0;
		function loadPage(j){
			lookLeft.src = '../collections/'+season+'/viewer/'+slides[j];	
			i++;
			console.log(i);
			j++;
			lookRight.src = '../collections/'+season+'/viewer/'+slides[j];	
			i++;
			console.log(i);
		}
		loadPage(i);
		console.log(i);
		$('p#left').click(function(){
			if(i>3){
			console.log(i);
			i-=4;
			loadPage(i);
			console.log(i);
			}else{
			console.log('start');
			}
		});
		$('p#right').click(function(){
			console.log(i);
			if(i<slides.length) {
			loadPage(i);
			console.log(i);
			} else {
			console.log('end');
			}
		});
	}
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
<?php
	echo "<div id='lookBook'>";
	echo "<div id='leftPage'>";
	echo "<p id='left'><</p>";
	echo "</div>";
	echo "<div id='rightPage'>";
	echo "<p id='right'>></p>";
	echo "</div>";
	echo "</div>";
	echo "<br />";
?>
</main>
</div>
</body>
</html>

