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
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>Copyright : NL YB RR</p>
                </blockquote>
                <figcaption class="blockquote-footer">Le plus beau des footer!</figcaption>
            </figure>
		</footer>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    const xmlhttp = new XMLHttpRequest();
                    xmlhttp.onload = function() {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                    xmlhttp.open("GET", "phpAjax/suggestionAjax.php?q=" + str);
                    xmlhttp.send();
                }
            }
        </script>
    </body>
</html>