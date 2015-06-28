<!DOCTYPE html>
<html>
<head>
<title>Contact - MYTH OF THE WEST</TITLE>
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
<label>Contact Us:</label><br />
<form action='contactsubmit.php' method='POST' id='contact'>
<label>First Name</label><br />
<input type='text' name='first' class='contact' /><br />
<label>Last Name</label><br />
<input type='text' name='last' class='contact' /><br />
<label>Email</label><br />
<input type='text' name='email' class='contact' /><br />
<label>Subject</label><br />
<input type='text' name='subject' class='contact' /><br />
<label>Message</label><br />
<textarea name='message' rows=5>
</textarea><br />
<input type='submit' value='Send' id='send' />
</form>
</main>
</div>
</body>
</html>
