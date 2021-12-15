<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "connexion.php";
	class ModeleVoiture extends Connexion{
		public function __construct(){
		}

		public function getListe() {
			$selectPrepare = self::$bdd->prepare('SELECT id, nom from joueurs');
			$selectPrepare->execute();
			$tabvoiture = $selectPrepare->fetchall();
			return $tabvoiture;
		}

		public function getDescription() {
			$tab = array($_GET['id']);
			$selectPrepare = self::$bdd->prepare('SELECT id, nom, description from joueurs WHERE id=?');
			$selectPrepare->execute($tab);
			$tabvoiture = $selectPrepare->fetchall();
			return $tabvoiture;
		}

		public function ajout(){
			$selectPrepare = self::$bdd->prepare('SELECT MAX(id) from joueurs');
			$selectPrepare->execute();
			$tabvoiture = $selectPrepare->fetchall();
			foreach ($tabvoiture as $cle => $value) {
				$id = $value['MAX(id)']+1;
			}
	
			$argselect = array($id, $_POST["nomVoiture"], $_POST["descriptionVoiture"]);
			$selectPrepare = self::$bdd->prepare('INSERT into joueurs(id, nom, description) values (?,?,?)');
			$selectPrepare->execute($argselect);
			echo("Confirmation de l'ajout!");
		}
	}	
?>