<?php
if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once "mod_generique.php";
include 'cont_voiture.php';

class ModVoiture extends ModGenerique {
    public $affichage;
    /*
        require_once 'connexion.php';
        Connexion::initConnexion();
    */
    public function __construct (){
        $this->controleur = new ContVoiture();
    }
}
?>