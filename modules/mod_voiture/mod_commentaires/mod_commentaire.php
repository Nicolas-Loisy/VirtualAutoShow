<?php
class ModCommentaire extends ModGenerique{
    protected $controleurComm;

    public function __construct(){
        include 'cont_commentaire.php';
        $this->controleurComm = new ContCommentaire();
    }

    public function getControleur() {
        return $this->controleurComm;
    }

}