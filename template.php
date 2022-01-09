<!DOCTYPE html>
<html>
	<head>
		<title>Site projet WEB</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

   		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<?php
        $module->getControleur()->lienFeuilleCSS();
        ?>

	</head>
	<body>
		<header>
            <?php
                $compMenu->getControleur()->afficherMenu();
            ?>
		</header>
        <main>
            <?php
            echo $affichage;
            ?>
        </main>
		<footer>
			<p>Footer Copyright : NL YB RR</p>
		</footer>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>