<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'cont_generique.php';
include 'vue_listeVoiture.php';
include 'modele_listeVoiture.php';

class ContListeVoiture extends ContGenerique {
    public $action;

    public function __construct (){
        $this->vue = new VueListeVoiture();
        $this->modele = new ModeleListeVoiture();

        $this->action = $_GET['action'];

        switch ($this->action) {
            case "bienvenue":
                $this->bienvenue();
                break;
            case "liste":
                $this->liste();
                break;
            case "details":
                $this->afficheDescription();
                break;
        }
    }

    public function bienvenue(){
        ?><p>Bienvenue.</p><?php
    }

    public function liste(){
        $tab = $this->modele->getListe();
        $this->vue->affiche_liste($tab);
    }

    public function afficheDescription(){
        $this->vue->affiche_details($this->modele->getDescription());
    }
}
?>