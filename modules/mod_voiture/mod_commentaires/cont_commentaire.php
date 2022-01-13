<?php

class ContCommentaire extends ContGenerique {
    protected $vueComm;
    protected $modeleComm;

    public function __construct(){
        include 'modele_commentaire.php';
        include 'vue_commentaire.php';
        $this->modeleComm = new ModeleCommentaire();
        $this->vueComm = new VueCommentaire();
    }

    public function ajout_commentaire() {
        //if ($_SESSION['id_user'] != null) {
            $this->vueComm->form_commentaire();
            if(isset($_POST['message'])) {
                $this->modeleComm->ajout_commentaire();
            }
        //}
    }

    public function liste_commentaire() {
        if (isset($_POST['commentaire'])) {
            $this->modeleComm->suppComm($_POST['commentaire']);
        }
        $this->vueComm->liste_commentaire($this->modeleComm->commandeSelect());
    }

    public function lienFeuilleCSS() {
        $this->vueComm->lienFeuilleCSS();
    }


}
