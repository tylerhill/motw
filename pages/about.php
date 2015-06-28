<!DOCTYPE html>
<html>
<head>
<title>About - MYTH OF THE WEST</TITLE>
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
<img src='/../profile.jpg' class='profile' /><br />
<div class='brick'>
<p>Myth of the West is a women's apparel and accessories brand, and the creative collaboration between designers Leah Chapman and Ailee John.</p><br />
<p>After receiving degrees from the Rhode Island School of Design and the Fashion Institute of Technology respectively, Leah and Ailee were both drawn westward in 2012, where they settled in Oakland, California. They were both hired at the same yarn manufacturing company that year, which is where they met for the first time, and realized they shared the same dream.</p><br />
<p>Myth of the West is about the once romanticized lifestyle of all those who traveled westward throughout history. Whether it was for the Great Western Expansion, the Gold Rush, Hollywood fame and fortune, or the latest tech boom, those with nothing to lose placed a bet on this golden West they had heard stories of. They picked up and moved what they could.</p><br />
<p>Like all things, the West is imperfect. Though it is generous to many, it can be hard for the self-reliant to survive in its ever-changing landscape. Corporations place profit over people, and consumers choose low-cost goods over quality and American production. Myth of the West is for those who still value hard work, and believe that the process just as important as the product.</p><br />
<p>In 2014 Leah and Ailee combined their complementary passions for designing, knitting, and dyeing unique garments and accessories, and founded Myth of the West. With Leah's talent for garment design and construction, and Ailee's eye for color and pattern, the garments they create together are flattering, beautifully constructed, and visually striking. Together, they encourage handmade American craftsmanship to carry on.</p><br />
<p>Myth of the West is created for women who love color, appreciate the feel and drape of luxury fibers, and express their style and taste with uncommon artisanal wardrobe items.  Each garment and accessory is designed, knit, dyed & finished by hand in Oakland, CA using luxury natural fibers and natural and non-toxic dyes.</p><br />
</div>
</main>
</div>
</body>
</html>
<?php
?>
