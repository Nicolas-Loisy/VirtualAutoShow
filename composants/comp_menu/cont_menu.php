<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'vue_menu.php';

class ContMenu{
    protected $vue;

    public function __construct () {
        $this->vue = new Vuemenu();
    }

    public function afficherMenu() {
        $this->vue->afficherMenu();
    }
}
?>