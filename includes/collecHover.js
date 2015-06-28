window.onload = function() {	
	if(window.jQuery) {
	$(document).ready(function(){
		var seasons;
		$.getJSON('/includes/seasons.php',{},function(data){
			seasons = data;
		});
		var prods;
		function loadProds() {
	
		$.getJSON('/includes/loadProds.php',{},function(data){
			prods = data;
		});
		}
		loadProds();
		var tag;
		var tagged;
		function render(tag) {
		$.getJSON('/includes/getproducts.php',{test:tag},function(data){
			tagged = data;
			loadTagged(tagged);
		});

		}
		var newProd;
		function loadTagged(hits) {
			for(i=0;i<hits.length;i++){
				var curHit = hits[i];
				$.getJSON('/includes/loadTagged.php',{hit:curHit},function(data){
					newProd = data;
					var rawTitle = newProd[1];
					newProd[1] = newProd[1].replace(/\s+/g,'');
					var newProdCreate = document.createElement('div');
					newProdCreate.id = newProd[1];
					console.log(newProd[1]);
					newProdCreate.className='prodthumb';
					$('div#prodCol').append(newProdCreate);

					newProdLink = document.createElement('a');
					newProdLink.href = 'product.php?PROD='+newProd[0];
					newProdLink.id = newProd[1];
					$('div#'+newProd[1]).append(newProdLink);
					console.log('div#'+newProd[1]);

					var newProdImg = document.createElement('img');
					newProdImg.src = '../products/'+rawTitle+'/small/thumb.jpg';
					console.log(newProdImg.src);
					newProdImg.className = 'prodthumb';
					$('a#'+newProd[1]).append(newProdImg);
					
					if(newProd[3]=="SOLD"){
					var newProdSold = document.createElement('p');
					newProdSold.id='sold';
					newProdSold.innerHTML='SOLD';
					$('a#'+newProd[1]).append(newProdSold);
					}
					
					var newProdTitle = document.createElement('p');
					newProdTitle.id = newProd[1];
					newProdTitle.className='prodthumb';
					newProdTitle.innerHTML = rawTitle.replace(' ',' <br />');
					$('a#'+newProd[1]).append(newProdTitle);
					
					var newProdPrice = document.createElement('p');
					newProdPrice.className='prodprice';
					newProdPrice.innerHTML='$'+newProd[2]+'.00';
					$('a#'+newProd[1]).append(newProdPrice);
				
					animateProds();
					
					
				});
			}
			
		}
		$('p.tag').click(function(){
			$('div#prodCol').empty();
			var setTag = $(this).attr('id');
			render(setTag);
		});


		var hoverLoaded = false;
			function collecIn () {
				var hoverOffY = $(this).offset().top;
				var hoverOffX = $(this).offset().left;
				var divWidth;
				for(i=0;i<seasons.length;i++){
					//var newLink = "<a href='"+seasons[i]+".html' class='ssLink'>"+seasons[i]+"</a>";
					var newLink = "<a href='/pages/season.php?season="+seasons[i]+"' class='ssLink'>"+seasons[i]+"</a>";
					$('div#collecHover').append(newLink);
				}
				$('a.ssLink').each(function(i){
					var linkWidth = $(this).width();
					var leftSet = ($(this).width())/2;
					var leftOff = $(this).position().left;
					leftSet = leftOff - leftSet;
					//$(this).css('left',leftSet+'px');
					divWidth = $('div#collecHover').width();
					divWidth = divWidth - linkWidth;
					divWidth = divWidth/2;
					$(this).css({'padding-left':divWidth+'px','padding-right':divWidth+'px'})
					//$(this).css('background-color','rgb(240,240,240)');
				});
				$('a.ssLink').animate({
					opacity:1
				}, 200, function() {
				hoverLoaded=true;
				});
				//$('a.ssLink').css('background-color','rgb(240,240,240)');
				
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

		function animateProds(){
		$('img.prodthumb').mouseenter(function(){
			$('img.prodthumb').finish();
			$(this).fadeTo(200,0.5);
			$(this).parent().children('p').fadeTo(200,1);
		});
		$('img.prodthumb').mouseleave(function(){
			$(this).fadeTo(200,1);
			$(this).parent().children('p').fadeTo(200,0);
		});
		}
		animateProds();


		});
	}
}

	
