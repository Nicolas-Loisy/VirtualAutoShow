<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "connexion.php";
	class Modele extends Connexion{
		public function __construct(){
		}

		public function getListe() {
			$selectPrepare = self::$bdd->prepare('select id, nom from joueurs');
			$selectPrepare->execute();
			$result = $selectPrepare->fetchall();
			return $result;
		}

		public function getDescription() {
			$tab = array($_GET['id']);
			$selectPrepare = self::$bdd->prepare('select id, nom, description from joueurs WHERE id=?');
			$selectPrepare->execute($tab);
			$result = $selectPrepare->fetchall();
			return $result;
		}
	}		
?>
