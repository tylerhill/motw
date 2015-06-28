<!DOCTYPE html>
<html>
<head>
<title>Contributors - MYTH OF THE WEST</TITLE>
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
<p class='contrib'>
We both know that there is no way we could have come this far alone. There are many contributors that have brought their passions and art-forms together to create art for MYTH OF THE WEST. We'd love to say thank you to them all for this, and allow you guys to check out some of their own personal artwork they create on their own.
</p><br />
<div class='brick'>
<label class='contribName'>ALAYNA TINNEY:</label>
<p>
Printmaker / Artist

Alayna is the work behind our beautiful tumbleweed logo illustration. She studied Art at UC Santa Cruz and currently lives in Oakland CA. You can check out her art at some local shops in the East Bay such as Tail of the Yak in Berkeley.
Alayna also modeled for our SS14 Collection available now.

</p><br />
<label class='contribName'>EVE ARBEL:</label>
<p>
Painter/ Artist

Eve modeled for us for our current SS14 Season. However, she is an accomplished artist in her own right. Studying Fine Art at UC Berkeley and currently living in Berkeley CA. Her thoughtful oil paintings have been displayed in shows such as PROCESS PORTRAIT hosted at the Firehouse Art Collective in North Berkeley. 

</p><br />
</div>
<div class='brick'>
<label class='contribName'>GIGIE HALL:</label>
<p>
Photographer/ Artist

Gigie Hall sees the vision for MYTH OF THE WEST through the lens of her camera. Though she studied Gender Studies with an emphasis in visual culture and media at UC Berkeley. She is a natural photographer with an art-focused mind who helps us to create a scene amongst dreamy landscapes. She's also an amazing collage-maker who has had her artwork featured in high-end boutique shops in NYC. View her personal website at: <a href='http://www.gigiehall.com'>www.gigiehall.com</a>

</p><br />
<label class='contribName'>TYLER HILL:</label>
<p>
Web Developer

Many thanks to Tyler Hill the man behind the digital presence of MYTH OF THE WEST. Tyler is currently enrolled in classes at Laney College in Oakland for Computer Science. He is also available for freelance web design and coding. Contact him at tylerhillwebdev@gmail.com.<br />
</p><br />
</div>
<p class='contrib'>
If you'd like to contact us about a contribution inquiry, please email info@mythofthewest.com. Please allow at least 24 hours for a response.
</p><br />
</main>
</div>
</body>
</html>
<?php
?>
