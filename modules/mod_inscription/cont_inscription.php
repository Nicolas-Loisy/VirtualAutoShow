<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'cont_generique.php';
include 'vue_inscription.php';
include 'modele_inscription.php';

class ContInscription extends ContGenerique {
    public $action;

    public function __construct () {
        $this->vue = new VueInscription();
        $this->modele = new ModeleInscription();

        $this->action = $_GET['action'];

        switch ($this->action) {
            case 'inscription' :
                $this->inscription();
                break;
        }
    }

    public function inscription() {
        $this->vue->form_inscription();
        if (isset($_POST['inputLogin'])) {
            $this->modele->inscription();
        }

    }
}
?>
