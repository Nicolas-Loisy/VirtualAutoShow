<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "connexion.php";

	class ModeleListeVoiture extends Connexion{
		public function __construct(){
		}

		public function getListe() {
			$selecPrepare = self::$bdd->prepare('select id,nom from equipes');
			$selecPrepare->execute();
			$result = $selecPrepare->fetchall();
			return $result;
		}

		public function getDescription() {
			$tab = array($_GET['id']);
			$selectPrepare = self::$bdd->prepare('select * from equipes WHERE id=?');
			$selectPrepare->execute($tab);
			$result = $selectPrepare->fetchall();
			return $result;
		}
	}	
?>
