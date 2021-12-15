<?php

    if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');
        
    require_once 'vue_generique.php';
   
    class Vue extends VueGenerique{
        public function __construct () {
            parent::__construct();
        }

        public function affiche_liste ($tab){

            echo "<h3>Liste:</h3>";

            foreach ($tab as $cle => $val){
                $id = $val['id'];
                echo "<p><a href=index.php?action=details&id=$id>";
                echo $val['nom'];
                echo"</a></p>";
            }
        }

        public function menu(){
            ?>
            <h3>Menu:</h3>
            <p><a href=index.php?action=bienvenue>Bienvenue</a></p>
            <p><a href=index.php?action=liste>Liste</a></p>
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
    }
?>
