<!DOCTYPE html>
<html>
	<head>
		<title>Site projet WEB</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<?php	
				$compMenu->affiche();
			?>
		</header>
		<?php
			echo $affichage;
		?>
		<footer>
			<p>Footer Copyright : NL YB RR</p>
		</footer>
	</body>
</html>