<?php
	$files = $_FILES['toUp'];
	//echo $files['name'][0];
	$item = $_POST['imgItem'];
	function imageResize($width,$height,$imgFile,$smallFile){
		list($w,$h) = getimagesize($imgFile);
		$ratio = max($width/$w, $height/$h);
		$h  = ceil($height/$ratio);
		$x = ($w - $width/$ratio) / 2;
		$w = ceil($width/$ratio);
		$imgString = file_get_contents($imgFile);
		$image = imagecreatefromstring($imgString);
		$tmp = imagecreatetruecolor($width,$height);
		imagecopyresampled($tmp,$image,0,0,$x,0,$width,$height,$w,$h);
		imagejpeg($tmp,$smallFile,100);
	}
	if($item) {
		$uploadDir = 'products/'.$item.'/';
		$smallDir = $uploadDir . 'small/';
		foreach($files['name'] as $i=>$file) {
			$uploadFile = $uploadDir . basename($files['name'][$i]);
			$smallFile = $smallDir . basename($files['name'][$i]);
			move_uploaded_file($files['tmp_name'][$i],$uploadFile);
			imageResize(800,667,$uploadFile,$smallFile);
		}
	}

?>
