<?php

class ModeleCommentaire extends Connexion{

    public function __construct(){}

    public function ajout_commentaireModele($login) {
        $requeteUtil = self::$bdd->prepare('SELECT idUtilisateur from utilisateur where login = ?');
        $requeteUtil->execute(array($login));
        $iduser = $requeteUtil->fetch();

        $requeteConstruc = self::$bdd->prepare('SELECT idConstructeur from voiture where idVoiture = ?');
        $requeteConstruc->execute(array($_GET['idVoiture']));
        $idConst = $requeteConstruc->fetch();


        $requeteFinal = self::$bdd->prepare('INSERT INTO `commentaire` (`contenu`, `idUtilisateur`, `idVoiture`, `idConstructeur`) VALUES (?, ?, ?, ?)');
        $requeteFinal->execute(array($_POST['message'], $iduser['idUtilisateur'], $_GET['idVoiture'], $idConst['idConstructeur']));
    }

    public function commandeSelect() {
        $selectPrepare = self::$bdd->prepare('SELECT idCommentaire, idUtilisateur, contenu, datePublication, login FROM commentaire natural join utilisateur where commentaire.idVoiture = ? order by datePublication');
        $selectPrepare->execute(array($_GET['idVoiture']));
        $result = $selectPrepare->fetchall();
        return $result;
    }

    public function suppComm($id) {
        $requeteFinal = self::$bdd->prepare('DELETE FROM `commentaire` WHERE `idCommentaire` = ?');
        $requeteFinal->execute(array($id));

    }

}