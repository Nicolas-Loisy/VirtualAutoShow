<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'cont_menu.php';

class CompMenu{
    protected $controleur;

    public function __construct (){
        $this->controleur = new ContMenu;
    }

    public function getControleur()
    {
        return $this->controleur;
    }
}
?>