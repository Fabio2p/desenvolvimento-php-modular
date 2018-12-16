<!DOCTYPE html>
<html>
<head>
	<title><?php echo $view_title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= PATH_SITE?>/css/bootstrap.min.css">
</head>
<body class="bg-body">

	<?php 
		foreach($view_youtube->items as $item):

			echo "<iframe width='30%' height='296' src='https://www.youtube.com/embed/$item->id' frameborder='0' allowfullscreen></iframe> <br />" .'<br />';

			echo '<h3>Título:</h3> '.$item->snippet->title;

		endforeach;	
	?>
	
</body>
</html>