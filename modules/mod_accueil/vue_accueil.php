<?php 

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'vue_generique.php';

class VueAccueil extends VueGenerique {

    public function msgTest() {
        echo "<p>CODE PAGE D'ACCUEIL</p>";
    }

    public function carousel() {
        ?>
        
        <?php
    }

}

?>