<!DOCTYPE html>
<html>
<head>
	<title>Success</title>
</head>
<body>
	<h1>DB Connection</h1>
	<h2>Datos traidos desde SACJA</h2>

	<?php
		if ($arreglo != null) {
			foreach ($arreglo as $key => $value) {
				echo '<p>'.$value.'</p>';
			}
		}
	?>
</body>
</html>