<?php

class ModeleCommentaire extends Connexion{

    public function __construct(){}

    public function ajout_commentaire() {

        $requeteFinal = self::$bdd->prepare('INSERT INTO `commentaire` (`contenu`, `idUtilisateur`, `idVoiture`, `idConstructeur`) VALUES (?, 3, 56, 24)');
        $requeteFinal->execute(array($_POST['message']/*, $_SESSION['id_user'], $_GET['idVoiture'], $_SESSION['id_Constructeur']*/));
    }

    public function commandeSelect() {
        //$tab = array($_GET['idVoiture']);
        $selectPrepare = self::$bdd->prepare('SELECT idCommentaire, idUtilisateur, contenu, datePublication, login FROM commentaire natural join utilisateur where commentaire.idVoiture = ? order by datePublication');
        $selectPrepare->execute(array(56));
        $result = $selectPrepare->fetchall();
        return $result;
    }

    public function suppComm($id) {
        $requeteFinal = self::$bdd->prepare('DELETE FROM `commentaire` WHERE `idCommentaire` = ?');
        $requeteFinal->execute(array($id));

    }

}