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

	
}	
?>