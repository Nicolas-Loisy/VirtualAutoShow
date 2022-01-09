<?php 

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'vue_generique.php';

class VueListeMarque extends VueGenerique {

    public function __construct()
    {
        parent::__construct();
    }

    public function lienFeuilleCSS() {
        ?>
        <link rel="stylesheet" type="text/css" href="modules/mod_listeMarque/style.css">
        <?php
    }

    public function ouvrirGrilleBootstrap() {
        ?>
        <div id="grille" class="mt-4">
            <div class="container">
                <div class="row row-cols-4 row-cols-lg-6">
        <?php
    }

    public function genererColonneBootstrap($src, $idConstr) {
        ?>
                    <div class="col d-flex align-items-stretch">
                        <a href="index.php?module=listeVoiture&idConstr=<?=$idConstr?>" class="my-2 p-2 fondLogo d-flex align-items-center">
                            <img src="img/imgLogoMarque/<?=$src?>" alt="logoMarque">
                        </a>
                    </div>
        <?php
    }

    public function fermerGrilleBootstrap() {
        ?>
                </div>
            </div>
        </div>
        <?php
    }
}

?>