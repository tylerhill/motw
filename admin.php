<!DOCTYPE html>
<?php 
include('includes/mysqli_connect.php');
?>
<html>
<head>
<title>DAT ADMIN THO</title>
<link rel=stylesheet href=adminstyle.css />
<script src='includes/jquery.js' type='text/javascript'></script>
<script>
window.onload = function() {
	if(window.jQuery) {
		function getProd(prod) {
				var fields = ['prod_title','price','colors','fiber','itemDesc','care','sizing','measure','code','tags'];
				$('div#imgs').empty();
				$.getJSON('getprod.php',{prod_id:prod},function(data) {
					var curTitle = data['prod_title'];
					$.each(data,function(key,val){
						if(key=='imgs'){
							$.each(val,function(i,src){
							var newImg = document.createElement('img');
							newImg.src = 'products/'+curTitle+'/'+src;
							newImg.id = src;
							newImg.className = 'curThumb';
							var delButt = document.createElement('input');
							delButt.type='button';
							delButt.value='Delete image';
							delButt.className = 'delButt';
							delButt.addEventListener('click',delImg,false);
							var thumbCont = document.createElement('div');
							thumbCont.id = curTitle;
							thumbCont.className = 'thumbCont';
							thumbCont.appendChild(newImg);
							thumbCont.appendChild(delButt);
							document.getElementById('imgs').appendChild(thumbCont);
							});
						} else {
							$('#'+key).val(val);
						}
					});
					$('input.del').attr('id',prod);
				});
		}
		function getImgs(prod) {
			$('div#imgs').empty();
			$.getJSON('getprod.php',{prod_id:prod},function(data) {
					var curTitle = data['prod_title'];
					var curImgs = data['imgs'];
					$.each(curImgs,function(i,src){
						var newImg = document.createElement('img');
						newImg.src = 'products/'+curTitle+'/'+src;
						newImg.id = src;
						newImg.className = 'curThumb';

						var delButt = document.createElement('input');
						delButt.type='button';
						delButt.value='Delete image';
						delButt.className = 'delButt';
						delButt.addEventListener('click',delImg,false);
						var thumbCont = document.createElement('div');
						thumbCont.id = curTitle;
						thumbCont.className = 'thumbCont';
						thumbCont.appendChild(newImg);
						thumbCont.appendChild(delButt);
						document.getElementById('imgs').appendChild(thumbCont);
					});
			});
		}
		function delImg() {
			var delImg = this.parentNode.childNodes[0];
			var delName = this.parentNode.id;
			var del = delImg.getAttribute('src');		
			var delBase = delImg.id;
			$.post('delimg.php',{del:del,delName:delName,delBase:delBase},function(data){
			});
			this.parentNode.removeChild(delImg);
			this.parentNode.removeChild(this);
			
		}
		$('a.inv').click(function() {
			var id = $(this).attr('id');
			getProd(id);
		});

		$('input#sendImg').click(function(){
			var imgData = new FormData();
			var fileInput = document.getElementById('imgUp');
			
			for (var i = 0; i < fileInput.files.length; i++) {
				imgData.append('toUp[]',fileInput.files[i]);
			
			}
			var imgItem = document.getElementById('prod_title').value;
			var imgId = document.getElementsByClassName('del')[0].id;
			imgData.append('imgItem',imgItem);

			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if(xhr.readyState==4){
					getImgs(imgId);
				}
			}
			xhr.open('post','upimg.php');
			xhr.send(imgData);
		});

		$('input.clear').val('');
		$('textarea.clear').val('');
		$('input.submit').click(function() {
			var fields = ['prod_title','price','colors','fiber','itemDesc','care','sizing','measure','code','tags'];
			var curVal = {};
			curVal['prod_id'] = $('input.del').attr('id');
				jQuery.each(fields,function(index,value) {
					if(index<4) {
					curVal[value] = $('input#'+value).val();
					} else {
					curVal[value] = $('textarea#'+value).val();
					}
				});
			$.post('sendadmin.php',curVal,function(data){
				window.location = 'admin.php';
				
			});
		});


		
		$('input.del').click(function() {
		var selected = $('input#prod_title').val();
		if(window.confirm("Delete "+selected+"?")){
			var id = $(this).attr('id');
			$.post('deladmin.php',{prod_id:id},function(data) {
				window.location = 'admin.php';
			});
		}
		});
	}
}
</script>
</head>
<body>
<div id=inventory>
<?php
	$q="SELECT * FROM products";
	$r=mysqli_query($dbc,$q);
	$fields = ['prod_title','price','colors','fiber','itemDesc','care','sizing','measure','code','tags'];
	$items = [];
	while($row = mysqli_fetch_array($r)) {
		$stats = [];
		foreach($fields as $field) {
			$id = $row['prod_id'];
			$stats[$field] = $row[$field];
			$items[$id] = $stats;
		}
	}
	echo "<div class=col>";
	$i = 1;
	foreach($items as $id=>$stats) {
		echo "<a href=# class=inv id=".($id).">";
		echo $stats['prod_title'];
		echo "</a>";
		if($i%10==0) {
			echo "</div>";
			echo "<div class=col>";
		}
		$i++;
	}
	echo "</div>";

	//
	//
	//for($i=0;$i<count($prod_title);$i++) {
	//	foreach($fields as $field) {
	//		echo "<label>$field</label><br />";
	//		echo "<p id=$field></p>";
	//	}
	//}
?>
</div>
<div id=update>
<?php
	$texts = ['prod_title','price','colors','fiber'];
	$areas = ['itemDesc','care','sizing','measure','code','tags'];
	echo "<div class=col>";
	foreach($texts as $text) {
		echo "<label>$text</label><br />";
		echo "<input type='text' name='$text' id=$text class=clear /><br />";
	}
	echo "</div>";
	$j = 1;
	echo "<span class=text>";
	foreach($areas as $area) {
		echo "<label class=text>$area</label><br />";
		echo "<textarea name='$area' id=$area class=clear></textarea><br />";
		if($j%3==0) {
			echo "</span>";
			echo "<span class=text>";
		}
		$j++;
	}
	echo "</span>";
	echo "<br />";
	
?>
<div id=imgs>


</div>
<input id=imgUp type=file multiple /><br />
<input type=button value='update imgs' id=sendImg /><br /><br />
<input type='submit' value='STRAIGHT POSTIN&#39' class='submit'/><br />
<input type=button value='FUCK DIS' class=del />
</div>
</body>
</html>
