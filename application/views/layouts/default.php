<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $template['title']; ?></title>
	<?php echo $template['metadata']; ?>
</head>
<body>

<div id="container">
	<h1><?php echo $template['title'];?></h1>

	<div id="body">
	<?php echo $template['body']; ?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>