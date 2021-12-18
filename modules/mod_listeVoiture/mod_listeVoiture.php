<?php
if (!defined('CONST_INCLUDE'))
die('Accès non-autorisé.');

require_once "mod_generique.php";
include 'cont_listeVoiture.php';

class ModListeVoiture extends ModGenerique {
    public function __construct (){
        $this->controleur = new ContListeVoiture();
    }
}
?>