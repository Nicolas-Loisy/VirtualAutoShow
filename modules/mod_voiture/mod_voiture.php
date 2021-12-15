<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "mod_generique.php";

	class ModVoiture extends ModGenerique {
		public $affichage;
		/*
			require_once 'connexion.php';
			Connexion::initConnexion();
		*/
		public function __construct (){
			include 'cont_voiture.php';
			$this->controleur = new ContVoiture();
			
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
				case "ajout":
					if (!isset($_POST['nomVoiture'])) {
						$this->controleur->form_ajout();
					}
					else{
						$this->controleur->ajout();
					}
			}

			$this->affichage = $this->controleur->getVue()->getAffichage();
		}	
	}
?>