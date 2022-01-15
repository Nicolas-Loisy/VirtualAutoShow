<?php
if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once "mod_generique.php";
include 'cont_voiture.php';

class ModVoiture extends ModGenerique {
    public $affichage;

    public function __construct (){
        $this->controleur = new ContVoiture();
    }
}
?>