<?php

	define('CONST_INCLUDE', NULL);

	session_start();
	require_once 'connexion.php';
	Connexion::initConnexion();
		
	$affichage = null;
	$choixModule = null;
	if (isset($_GET['module']))
		$choixModule = $_GET['module'];

	switch ($choixModule) {
		case "Voiture":
			require_once 'modules/mod_voiture/mod_voiture.php';
			$module = new modVoiture();
			break;
		case "listeVoiture":
			require_once 'modules/mod_listeVoiture/mod_listeVoiture.php';
			$module = new modListeVoiture();
			break;
		case "Connexion":
			require_once 'modules/mod_connexion/mod_connexion.php';
			$module = new modConnexion();
			break;
		case "administrationConstructeur":
			require_once 'modules/mod_administrationConstructeur/mod_administrationConstructeur.php';
			$module = new modAdministrationConstructeur();
			break;
		case "administration":
			require_once 'modules/mod_administration/mod_administration.php';
			$module = new modAdministration();
			break;
		case "Inscription":
			require_once 'modules/mod_inscription/mod_inscription.php';
			$module = new ModInscription();
			break;
		default:
			require_once 'modules/mod_accueil/mod_accueil.php';
			$module = new modAccueil();
		 	break;
	}

	// la variable $affichage qui contient le code HTML du module s'initialise de cette manière désormais
	$affichage = $module->getControleur()->getVue()->getAffichage();

	require_once 'composants/comp_menu.php';
	$compMenu = new compMenu();
	
	/* l'affichage du site  et affiche $affichage precedemment calcule */
	include 'template.php';

?>

