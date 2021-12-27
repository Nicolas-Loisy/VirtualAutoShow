<?php
if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once "mod_generique.php";
include 'cont_inscription.php';

class ModInscription extends ModGenerique {
    public function __construct() {

        $this->controleur = new ContInscription;

    }
}
?>