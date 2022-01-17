<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'modele_recommandation.php';
require_once 'vue_recommandation.php';

class ContRecommandation {
    protected $vue;
    protected $modele;

    public function __construct () {
        $this->vue = new VueRecommandation();
        $this->modele = new ModeleRecommandation();

        // Ton code.
        // Récupère les infos que tu veux en utilisant ta classe modele puis affiche la liste des voitures recommandées en utilisant les fonctions de ma vue.
    }

}
?>