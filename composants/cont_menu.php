<?php
include 'modele_menu.php';
include 'vue_menu.php';

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