<?php
if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once "mod_generique.php";
include 'cont_connexion.php';

class ModConnexion extends ModGenerique {
    public function __construct() {

        $this->controleur = new ContConnexion;

    }
}
?>