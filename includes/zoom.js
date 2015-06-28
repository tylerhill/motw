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
		var viewer;
		var mainOffsetY;
		var topMove;
		var leftMove;
		for (i=0;i<prodViewThumbs.length;i++) {
			prodViewThumbs[i].addEventListener('click',function(){
				newProdView = this.src;
				curProdView.src = newProdView;
			});
		}
		$('img#curProdView').mouseenter(function(){
				imgHover = $(this).attr('src');
				zoomImg = document.createElement('img');
				zoomImg.id = 'zoomImg';
				imgHover = imgHover.replace('small\/','');
				zoomImg.src = imgHover;
				$('div#prodInfo').children().fadeOut(100,function(){
					$('div#prodInfo').append(zoomImg);
				});
				
			});
		$('img#curProdView').mouseleave(function(){
			$('div#prodInfo').children().fadeTo(200,1);
			$('img#zoomImg').remove();
				
		});
		document.addEventListener('mousemove',function(e){
					viewer = document.getElementById('prodViewer');
					mainOffsetY = document.getElementsByTagName('main');
					mainOffsetY = mainOffsetY[0].offsetTop;
					mouse.x = e.pageX;
					mouse.y = e.pageY
					zoomOffsetX = viewer.offsetLeft;
					zoomOffsetY = viewer.offsetTop;
					zoomOffsetY = zoomOffsetY + mainOffsetY;
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
					$('img#zoomImg').css('top',topMove);
					zoomImg.style.top = -topMove + 'px';
					zoomImg.style.left = -leftMove + 'px';
		});
