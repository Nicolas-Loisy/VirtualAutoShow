<?php

	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');
		
	include 'vue.php';
	include 'modele.php';

	class Controleur {
		public $vue;
		private $modele;
		public $action;
		
		public function __construct () {
			$this->vue = new Vue();
			$this->modele = new Modele();

			if(isset($_GET['action'])){
				$this->action = $_GET['action'];
			}	
			else if(!isset($_GET['details'])){
				$this->action = "bienvenue";
			}					
		}

		public function bienvenue(){
			?><p>Welcome!!!</p><?php
		}

		public function liste(){
			$tab = $this->modele->getListe();
			$this->vue->affiche_liste($tab);
		}

		public function afficheDescription(){
			$this->vue->affiche_details($this->modele->getDescription());
		}
	}
?>