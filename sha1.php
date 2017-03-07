<!doctype html>
<html>
	<head>
		<title>sha1</title>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#botonTraducir').click(function(){
					var valor = $('#texto').val();
					console.log(sha1(valor));
					//$('#resultado').val(valor);
					//$('#resultado').css("background","#aaa");
				});
			});
		</script>
	</head>
	<body>
		<form action="#" method="GET">
			<input type="text" id="texto" name="texto">
			<button id="botonTraducir" type="submit">Traducir</button>
		</form>
		
		<h3 id="resultado">
			<?php
				if(isset($_GET['texto'])){
					echo sha1($_GET['texto']);
				}
			?>
		</h3>
	</body>
</html>