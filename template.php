<!DOCTYPE html>
<html>
	<head>
		<title>Site projet WEB</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

   		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>