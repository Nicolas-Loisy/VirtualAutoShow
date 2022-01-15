<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

class ContCommentaire extends ContGenerique {
    protected $vueComm;
    protected $modeleComm;

    public function __construct(){
        include 'modele_commentaire.php';
        include 'vue_commentaire.php';
        $this->modeleComm = new ModeleCommentaire();
        $this->vueComm = new VueCommentaire();
    }

    public function ajout_commentaire($login) {
        $this->vueComm->form_commentaire();
        if(isset($_POST['message'])) {
            $this->modeleComm->ajout_commentaireModele($login);
        }
    }

    public function liste_commentaire($login, $role) {
        if (isset($_POST['commentaire'])) {
            $this->modeleComm->suppComm($_POST['commentaire']);
        }
        $this->vueComm->liste_commentaireVue($this->modeleComm->commandeSelect(), $login, $role);
    }

    public function lienFeuilleCSS() {
        $this->vueComm->lienFeuilleCSS();
    }


}
