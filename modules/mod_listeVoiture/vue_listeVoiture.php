<?php
    if (!defined('CONST_INCLUDE'))
        die('Accès non-autorisé.');

    require_once 'vue_generique.php';
    class VueListeVoiture extends VueGenerique{
        public function __construct () {
            parent::__construct();
        }

        public function affiche_liste ($tab){
            echo "<h3>Catalogue de voitures :</h3>";
            foreach ($tab as $cle => $val){
                $id = $val['id'];
                echo "<p ><a href=index.php?module=listeVoiture&action=details&id=$id>";
                echo $val['nom'];
                echo"</a></p>";
            }
        }

        public function affiche_details($tab){
            foreach ($tab as $cle => $val){
                echo "<p>Club: ";
                echo $val['nom'];
                echo "</p>";

                echo "<p>Description: ";
                echo $val['description'];
                echo"</p>";
                //  \ carac d'echappement
                echo "<p id=\"idAcrea\">Année de création: ";
                echo $val['annee_creation'];
                echo "</p>";

                echo "<p>Pays: ";
                echo $val['pays'];
                echo "</p>";

                echo "<p>Image: <img src=\"https://www.iut.univ-paris8.fr/sites/default/files/LOGO%20IUT%20MONTREUIL%20Moyen.jpg\" ";
                echo $val['logo'];
                echo "/> </p>";
            }
        }

        public function ouvertureListe($nomMarque)
        {
            ?>
            <div id="grille" class="mt-3">
                <div class="container border-bottom mb-3">
                    <h2><?=$nomMarque?></h2>
                </div>

                <!-- Une double grille. Pourquoi ? psk c'est la seule solution que j'ai trouvé pour mettre une balise <a> (qui contient une ligne entière de la grille) sans bz bootstrap -->
                <div class="container">
            <?php

        }

        public function genererUneVoiture($idVoiture, $photo, $nomVoiture, $description)
        {
            ?>
                    <div class="row mb-3">
                        <a href="index.php?module=voiture&idVoiture=<?=$idVoiture?>">

                            <div class="container">
                                <div class="row fond p-3">
                                    <div class="col-6 col-md-4">
                                        <img src="img/imgVoiture/<?=$photo?>" alt="imgVoiture">
                                    </div>
                                    <div class="col-6 col-md-8">
                                        <h3><?=$nomVoiture?></h3>
                                        <span>
                                            <?=$description?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
            <?php
        }

        public function fermetureListe()
        {
            ?>
                </div>
            </div>
            <?php
        }

        public function lienFeuilleCSS()
        {
            ?>
            <link rel="stylesheet" type="text/css" href="modules/mod_listeVoiture/style.css">
            <?php
        }
    }
?>
