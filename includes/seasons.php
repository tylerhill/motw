<?php
	$collecDir = '../collections';
	$seasons = scandir($collecDir);
	$seasons = array_diff($seasons,array('..','.'));
	sort($seasons);
	echo json_encode($seasons);
?>
