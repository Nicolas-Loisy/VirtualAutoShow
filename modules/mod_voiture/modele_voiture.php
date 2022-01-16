<?php

if (!defined('CONST_INCLUDE'))
	die('Accès non-autorisé.');

require_once "modele_generique.php";

class ModeleVoiture extends ModeleGenerique {
	public function __construct(){
	}

    public function getDonneesVoiturePrincipale() {
        $objRequete = self::$bdd->prepare("SELECT marque, nomVoiture, photo, description, nbPlace, poids, volumeCoffre, vitesseMax, autonomie, moteur FROM voiture NATURAL JOIN constructeur NATURAL JOIN photo WHERE photo.photo LIKE '%overview%' AND photo.idVoiture=?");
        $objRequete->execute(array($_GET["idVoiture"]));
        return $objRequete->fetch();
    }

    public function getPhotoDetails() {
        $objRequete = self::$bdd->prepare("SELECT photo FROM photo WHERE idVoiture=? AND photo NOT LIKE '%overview%'");
        $objRequete->execute(array($_GET["idVoiture"]));
		return $objRequete->fetchall();
    }

    public function getHashtagVoit() {
        $objRequete = self::$bdd->prepare("SELECT texte FROM voiture NATURAL JOIN estliee NATURAL JOIN hashtag WHERE idVoiture=?");
        $objRequete->execute(array($_GET["idVoiture"]));
        return $objRequete->fetchall();
    }

    public function followVoiture(){
        $requeteUtil = self::$bdd->prepare('SELECT idUtilisateur from utilisateur where login = ?');
        $requeteUtil->execute(array($_SESSION["login"]));
        $iduser = $requeteUtil->fetch();

        $reqFollow = self::$bdd->prepare('SELECT * FROM suivremodele WHERE idUtilisateur=? AND idVoiture=?');
        $reqFollow->execute(array($iduser['idUtilisateur'], $_GET["idVoiture"]));

        $resultFollow = $reqFollow->fetch();

        if (!$resultFollow) {
            $insertFollow = self::$bdd->prepare('INSERT INTO suivremodele (`idUtilisateur`, `idVoiture`) VALUES (?,?)');
            $insertFollow->execute(array($iduser['idUtilisateur'], $_GET["idVoiture"]));
        }else{
            $deleteFollow = self::$bdd->prepare('DELETE FROM suivremodele WHERE idUtilisateur = ? AND idVoiture = ?');
            $deleteFollow->execute(array($iduser['idUtilisateur'], $_GET["idVoiture"]));
        }
    }

    public function followMarque(){
        $reqIdConstructeur = self::$bdd->prepare('SELECT idConstructeur FROM voiture WHERE idVoiture=?');
        $reqIdConstructeur->execute(array($_GET["idVoiture"]));
        $resultIdConstructeur = $reqIdConstructeur->fetch();

        $requeteUtil = self::$bdd->prepare('SELECT idUtilisateur from utilisateur where login = ?');
        $requeteUtil->execute(array($_SESSION["login"]));
        $iduser = $requeteUtil->fetch();

        $reqFollow = self::$bdd->prepare('SELECT * FROM suivreconstructeur WHERE idUtilisateur=? AND idConstructeur=?');
        $reqFollow->execute(array($iduser['idUtilisateur'], $resultIdConstructeur['idConstructeur']));

        $resultFollow = $reqFollow->fetch();

        if (!$resultFollow) {
            $insertFollow = self::$bdd->prepare('INSERT INTO suivreconstructeur (`idUtilisateur`, `idConstructeur`) VALUES (?,?)');
            $insertFollow->execute(array($iduser['idUtilisateur'], $resultIdConstructeur['idConstructeur']));
        }else{
            $deleteFollow = self::$bdd->prepare('DELETE FROM suivreconstructeur WHERE idUtilisateur = ? AND idConstructeur = ?');
            $deleteFollow->execute(array($iduser['idUtilisateur'], $resultIdConstructeur['idConstructeur']));
        }
    }
}	
?>