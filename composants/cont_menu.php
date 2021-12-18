<?php
include 'modele_menu.php';
include 'vue_menu.php';

class ContMenu{
    public $vue_menu;

    public function __construct () {
        $this->vue_menu = new Vuemenu();
    }
}
?>