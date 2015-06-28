	window.onload = function() {
		var newWidth;
		var curOffset;
		var brand = document.getElementById('logo');
		if (window.pageYOffset!==0) {
			brand.style.width='10%';
			var curWidth = brand.style.width;
		} else {
			brand.style.width='80%';
			var curWidth = brand.style.width;
			widthCount=70;
		}
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

	window.onscroll = scrollFunc;
	function scrollFunc() {
		if(widthCount==70) {
			for(i=0;i<=6;i++){
			var curWidth = brand.style.width;
			brand.style.width = widthCount + '%';
			widthCount = widthCount - 10;
			}
		}
	}

	}
