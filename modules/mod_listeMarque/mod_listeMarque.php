<?php  

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once "mod_generique.php";
require_once "modules/mod_listeMarque/cont_listeMarque.php";

class ModListeMarque extends ModGenerique {
    public function __construct() {
        $this->controleur = new ContListeMarque();
    }
}

?>