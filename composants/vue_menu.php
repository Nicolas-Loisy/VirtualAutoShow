<?php
class VueMenu{

    public function __construct (){

    }

    public function afficherMenu() {
        ?>
        <nav class="navbar navbar-expand-md navbar-light container-md">
            <a class="navbar-brand" href="index.php">Virtual Auto Show</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex-md justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Showroom</a>
                    </li>
                    <?php
                    if(isset($_SESSION['login'])){
                        ?>
                        <span class="navbar-text">
				        	bienvenue <?=$_SESSION['login']?>
				        </span>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Déconnexion</a>
                        </li>
                        <?php
                    }
                    else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?module=Connexion&action=connexion">Connexion</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <?php

    }
}
?>

