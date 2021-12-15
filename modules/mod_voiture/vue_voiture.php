<?php
    if (!defined('CONST_INCLUDE'))
        die('Accès non-autorisé.');

    require_once 'vue_generique.php';
    class VueVoiture extends VueGenerique{
        public function __construct () {
            parent::__construct();
        }

        public function affiche_liste ($tab){
            echo "<h3>Liste:</h3>";

            foreach ($tab as $cle => $val){
                $id = $val['id'];
                echo "<p><a href=index.php?module=Voiture&action=details&id=$id>";
                echo $val['nom'];
                echo"</a></p>";
            }
        }

        public function menu(){
            ?>
                <h3>Menu Voiture:</h3>
                <p><a href=index.php?module=Voiture&action=bienvenue>Bienvenue</a></p>
                <p><a href=index.php?module=Voiture&action=liste>Liste</a></p>
                <p><a href=index.php?module=Voiture&action=ajout>Ajout</a></p>
            <?php   
        }

        public function affiche_details($tab){
            foreach ($tab as $cle => $val){
                echo "<p>";
                echo $val['nom'];
                echo " : ";
                echo $val['description'];
                echo"</p>";
            }
        }

        public function form_ajout(){
            ?>
            <form action="index.php?module=Voiture&action=ajout" method="post">
                <p>Nom voiture :</p>
                <input type="text" name="nomVoiture">
                <p>Description :</p>
                <input type="text" name="descriptionVoiture">
                <p></p>
                <input type="submit" name="sendButton" value="ajouter">
            </form>
            <?php
        }
    }
?>