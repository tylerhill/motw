<?php
	$message = $_POST['message'];
	$sub = $_POST['subject'];
	$from = $_POST['email'];
	$first = $_POST['first'];
	$last = $_POST['last'];
	$to = 'studio@mythofthewest.com';
	$headers = 'From: ' .$from. '\r\n';

	$message = $message . "\n-Message from " .$first . " " . $last;
	mail($to,$sub,$message,$headers);
?>
<!DOCTYPE html>
<html>
<head>
<title>MYTH OF THE WEST</TITLE>
<link href='../style.css' rel='stylesheet' type='text/css' />
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
<label id='thanks'>Thank you for your message!</label>
</main>
</div>
</body>
</html>
