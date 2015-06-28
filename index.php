<?php 
	$dir = './viewer';
	$shots = scandir($dir);
	$shots = array_diff($shots,array('..','.'));
	sort($shots);
	$viewerCount = count($shots);

	$collecDir = './collections';
	$seasons = scandir($collecDir);
	$seasons = array_diff($seasons,array('..','.'));
	sort($seasons);
?>
<!DOCTYPE html>
<html>
<head>
	<script src='/includes/jquery.js' type='text/javascript'></script>
	<script>
	window.onload = function() {


			var viewerCount;
			var shots;
			var onOff;
			shots = <?php echo json_encode($shots); ?>;
			viewerCount = 0; 
			onOff=0;




		var scrollDist = window.pageYOffset;
		var shrink = false;

		if(window.jQuery) {
		$(document).ready(function() {
		
		var preImages = new Array();
		for(i=0;i<shots.length;i++) {
			preImages[i] = new Image();
			preImages[i].src = '/viewer/'+shots[i];
		}

		var i = 0;
		var setFade = 1;

		var dummyImg = new Image();
		dummyImg.className='current';
		dummyImg.id='back';
		dummyImg.src = '/viewer/1.jpg';
		$('div#viewer').append(dummyImg);
		var dummyImg = new Image();
		dummyImg.className='current';
		dummyImg.id='front';
		$('div#viewer').append(dummyImg);

		var setFb = 'front';
		i++;
		window.setInterval(function(){
			timed(setFb);
		},4000);
		setTimeout(function(){
			window.setInterval(function(){
				frontFade(setFade);
			},4000);
		},2000);

		function timed(fbSwitch) {
			if(fbSwitch=='back') {
				setFb='front';
			} else {
				setFb='back';
			}

			if(i<shots.length) {
				update(i,fbSwitch);
			} else {
				i = 0;
				update(i,fbSwitch);
			}

		}
		function frontFade(fade) {
			$('img#front').fadeTo(1000,fade,function(){
				if(fade==1) {
					setFade=0;
				} else {
					setFade=1;
				}

			});
		}


		function update(iView,fbSwitch) {
			if(preImages[iView].complete==true) {
				var updateSrc = preImages[iView].src;
				preImages[iView].className = 'current';
				preImages[iView].id = fbSwitch;
				$('img#'+fbSwitch).attr('src',updateSrc);
			}

			i++;
		}




		

			
		var seasons = <?php echo json_encode($seasons); ?>;
		var hoverLoaded = false;

			function collecIn () {
				var hoverOffY = $(this).offset().top;
				var hoverOffX = $(this).offset().left;
				var divWidth;
				for(i=0;i<seasons.length;i++){
					var newLink = "<a href='/pages/season.php?season="+seasons[i]+"' class='ssLink'>"+seasons[i]+"</a>";
					$('div#collecHover').append(newLink);
				}
				$('a.ssLink').each(function(i){
					var linkWidth = $(this).width();
					var leftSet = ($(this).width())/2;
					var leftOff = $(this).position().left;
					leftSet = leftOff - leftSet;
					divWidth = $('div#collecHover').width();
					divWidth = divWidth - linkWidth;
					divWidth = divWidth/2;
					$(this).css({'padding-left':divWidth+'px','padding-right':divWidth+'px'})
				});
				$('a.ssLink').animate({
					opacity:1
				}, 200, function() {
				hoverLoaded=true;
				});
				
			}
			function collecOut() {
				if(hoverLoaded==true) {
				$('a.ssLink').animate({
					opacity:0
				}, 200,function(){
					$('a.ssLink').remove();
					hoverLoaded=false;
				});
				}
			}
		$('div#collecHover').mouseenter(collecIn);
		$('div#collecHover').mouseleave(collecOut);

		});

		
		window.addEventListener('scroll',function(evt){
		if (topScroll = 0) {
		}
		});

		} else {





	

	}	
	}

	</script>

<link href='style.css' rel='stylesheet' type='text/css' />
<title>MYTH OF THE WEST - apparel and accessories handmade in oakland california</title>
</head>
<body>
<div id='centerCol'>
<header>
<div id='brand'>
<a href='#'>
<img src='weedcroplrg.png' id='logo' />
</a>
<img src='banner.png' id='banner' alt='MYTH OF THE WEST'/>
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
<div id='viewer'>
</div>
</main>
<footer>
</footer>
</div>
</body>
</html>
