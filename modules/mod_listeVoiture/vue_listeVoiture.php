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
    }
?>
