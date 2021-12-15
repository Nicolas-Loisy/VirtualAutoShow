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
			$affichage = $module->affichage;
			break;
		case "listeVoiture":
			require_once 'modules/mod_listeVoiture/mod_listeVoiture.php';
			$module = new modListeVoiture();
			$affichage = $module->affichage;
			break;
		case "Connexion":
			require_once 'modules/mod_connexion/mod_connexion.php';
			$module = new modConnexion();
			$affichage = $module->affichage;
			break;
		default:
			require_once 'modules/mod_accueil/mod_accueil.php';
			// $module = new modAccueil();
			// $affichage = $module->affichage;
			break;
	}

	require_once 'composants/comp_menu.php';
	$compMenu = new compMenu();
	
	/* l'affichage du site  et affiche $affichage precedemment calcule */
	include 'template.php';

?>

