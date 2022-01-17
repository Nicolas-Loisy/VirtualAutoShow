<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'cont_recommandation.php';

class CompRecommandation {
    protected $controleur;

    public function __construct (){
        $this->controleur = new ContRecommandation();
    }
}
?>