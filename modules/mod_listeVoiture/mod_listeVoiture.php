<?php
	if (!defined('CONST_INCLUDE'))
	die('Accès non-autorisé.');

	require_once "mod_generique.php";
	include 'cont_listeVoiture.php';

	class ModListeVoiture extends ModGenerique {
		public function __construct (){
			$this->controleur = new ContListeVoiture();
			
			switch ($this->controleur->action) {
				case "bienvenue":
					$this->controleur->bienvenue();
					break;
				case "liste":
					$this->controleur->liste();
					break;
				case "details":
					$this->controleur->afficheDescription();
					break;
			}
			$this->affichage = $this->controleur->getVue()->getAffichage();
		}		
	}
?>