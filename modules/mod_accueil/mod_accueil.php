<?php  

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once "mod_generique.php";
require_once "modules/mod_accueil/cont_accueil.php";

class ModAccueil extends ModGenerique {
    public function __construct() {
        $this->controleur = new ContAccueil();
    }
}

?>