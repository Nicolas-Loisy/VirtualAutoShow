<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once "cont_generique.php";
require_once "modules/mod_accueil/vue_accueil.php";

class ContAccueil extends ContGenerique {
    public function __construct() {
        $this->vue = new VueAccueil();

        $this->vue->msgTest();
    }
}

?>