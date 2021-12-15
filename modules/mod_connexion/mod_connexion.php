<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "mod_generique.php";
	include 'cont_connexion.php';

	class ModConnexion extends ModGenerique {
		public function __construct (){

			$this->controleur = new ContConnexion;

			switch ($this->controleur->action) {
				case 'connexion':				
					if (!isset($_SESSION['login'])) {
						$this->controleur->form_connexion();
					}else{
						echo "Vous êtes déjà connecté : ";
						echo $_SESSION['login'];
					}
					break;
				case 'connecter':
					$this->controleur->connexion();
					break;
				case 'deconnexion':
					$this->controleur>deconnexion();
					break;
			}
			
			$this->affichage = $this->controleur->getVue()->getAffichage();
		}	
	}
?>