<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

class ModCommentaire extends ModGenerique{

    public function __construct(){
        include 'cont_commentaire.php';
        $this->controleur = new ContCommentaire();
    }

}