<?php
	/*if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	if (!defined($_SESSION['role']))
		die('Accès non-autorisé.');	

	if ($_SESSION['role']!=2) {
		die("Accès non-autorisé.");
	}*/

	require_once "mod_generique.php";
    include 'cont_administrationConstructeur.php';
	class ModAdministrationConstructeur extends ModGenerique {
		public $affichage;
		/*
			require_once 'connexion.php';
			Connexion::initConnexion();
		*/
		public function __construct (){
			$this->controleur = new ContAdministrationConstructeur();
		}	
	}
?>