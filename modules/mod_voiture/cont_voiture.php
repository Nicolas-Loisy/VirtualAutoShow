<?php

	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once 'cont_generique.php';
	include 'vue_voiture.php';
	include 'modele_voiture.php';

	class ContVoiture extends ContGenerique {
		public $action;
		
		public function __construct () {
			$this->vue = new VueVoiture();
			$this->modele = new ModeleVoiture();

			$this->vue->menu();

			if(isset($_GET['action'])){
				$this->action = $_GET['action'];
			}
			else if(!isset($_GET['details'])){
				$this->action= "bienvenue";
			}			
		}

		public function bienvenue(){
			?><p>Bienvenue!</p><?php
		}

		public function liste(){
			$tab = $this->modele->getListe();
			$this->vue->affiche_liste($tab);
		}

		public function afficheDescription(){
			$this->vue->affiche_details($this->modele->getDescription());
		}

		public function form_ajout(){
        	$this->vue->form_ajout(); 
        }

        public function ajout(){
        	$this->modele->ajout();
        }
	}
?>