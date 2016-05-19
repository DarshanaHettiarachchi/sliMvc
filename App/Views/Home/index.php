<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<h1>Hello</h1>
	<p>Hello From View</p>
	<?php echo $name ?>
    <?php foreach ($colors as $color) { ?>
        <li><?php echo $color; ?></li>
    <?php } ?>   
</body>
</html>