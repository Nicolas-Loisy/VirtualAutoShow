<?php 

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'vue_generique.php';

class VueAccueil extends VueGenerique {

    public function __construct()
    {
        parent::__construct();
    }

    public function affichagePage() {
        ?>
        <div class="container-fluid mb-5" id="hero">
            <h2 id="titre" class="text-center text-uppercase fs-1 lh-base p-3 text-white" >Le plus grand salon auto jamais <br>organisé dans l'histoire
            </h2>

            <div id="containerCarousel" class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/imgVoiture/Ferrari_488_Pista_2018_0cb07.jpg" class="d-block w-100 imgCarousel" alt="Ferrari 488 Pista">
                        </div>
                        <div class="carousel-item">
                            <img src="img/imgVoiture/806587_1.jpg" class="d-block w-100 imgCarousel" alt="Jaguar E-Type">
                        </div>
                        <div class="carousel-item">
                            <img src="img/imgVoiture/vu2a002ba7v71.jpg" class="d-block w-100 imgCarousel" alt="Koenigsegg One:1">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <h3 class="text-center p-4 text-white">Venez approcher de plus près une de nos 1000 voitures, et laissez votre esprit prendre le volant !</h3>

            <div class="d-flex justify-content-center pb-4">
                <a href="index.php?module=listeMarque">
                    <button type="button" class="btn btn-lg btn-primary">Accéder au Showroom</button>
                </a>
            </div>
        </div>
        <?php
    }

    public function lienFeuilleCSS() {
        ?>
        <link rel="stylesheet" type="text/css" href="modules/mod_accueil/style.css">
        <?php
    }
}

?>