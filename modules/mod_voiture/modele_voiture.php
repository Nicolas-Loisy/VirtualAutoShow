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


}	
?>