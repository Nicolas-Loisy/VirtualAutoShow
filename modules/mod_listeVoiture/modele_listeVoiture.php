<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "connexion.php";
	require_once "modele_generique.php";

	class ModeleListeVoiture extends ModeleGenerique {
		public function __construct(){
		}

		public function recupererNomConstr($idConstr)
		{
			$objRequete = self::$bdd->prepare("SELECT marque FROM constructeur WHERE idConstructeur=?");
			$objRequete->execute(array($idConstr));
			return $objRequete->fetchAll();
		}

        public function recupererVoituresBD($idConstr)
        {
			$objRequete = self::$bdd->prepare("SELECT idVoiture, photo, nomVoiture, description FROM voiture NATURAL JOIN photo WHERE photo LIKE '%overview%' AND idConstructeur=?");
			$objRequete->execute(array($idConstr));
			return $objRequete->fetchAll();
        }
    }
?>
