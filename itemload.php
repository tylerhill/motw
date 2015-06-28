<!DOCTYPE html>
<html>
<head>
<title>loader</title>
</head>
<body>
<?php
echo "
	<form method='POST' action='createitem.php'>
	<input type='text' name='prod_title' value='title' />
	<textarea name='itemDesc'>desc</textarea>
	<input type='number' name='price' value='price' />
	<input type='text' name='colors' value='colors' />
	<input type='text' name='fiber' value='fiber' />
	<input type='text' name='care' value='care' />
	<textarea name='sizing'>sizing</textarea>
	<textarea name='measure'>measure</textarea>	
	<input type='submit' />
	</form>";
?>
</body>
</html>
