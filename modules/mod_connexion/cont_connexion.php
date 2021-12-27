<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'cont_generique.php';
include 'vue_connexion.php';
include 'modele_connexion.php';

class ContConnexion extends ContGenerique {
    public $action;

    public function __construct () {
        $this->vue = new Vueconnexion();
        $this->modele = new Modeleconnexion();

        $this->action = $_GET['action'];

        switch ($this->action) {
            case 'connexion':
                if (!isset($_SESSION['login'])) {
                    $this->form_connexion();
                } else {
                    echo "Vous êtes déjà connecté : ";
                    echo $_SESSION['login'];
                }
                break;
            case 'connecter':
                $this->connexion();
                break;
            case 'deconnexion':
                $this->deconnexion();
                break;
        }
    }

    public function form_connexion(){
        $this->vue->form_connexion();
    }

    public function connexion(){
        $this->modele->connexion();
    }

    public function deconnexion(){
        $this->modele->deconnexion();
    }

}
?>