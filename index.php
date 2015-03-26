<?php

include_once('includes/lang/languages.array');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container-fluid">
	<div class="center-block">
		<h1>Test Translation Text</h1><br /><br />
	<?php
		
		echo $lang['fr_FR']['HELLO'] . '! <br />';
		echo $lang['de_DE']['WELCOME_TO'] . '<br />';
		echo $lang['pl_PL']['PLEASE_FEEL'] . ',' . $lang['pl_PL']['DONT_TOUCH']; 

	?>

	</div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>

