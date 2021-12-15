<?php

	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');
	
	require_once 'cont_generique.php';
	include 'vue_connexion.php';
	include 'modele_connexion.php';

	class ContConnexion extends ContGenerique {
		public $action;
		
		public function __construct () {
			$this->vue = new Vueconnexion();
			$this->modele = new Modeleconnexion();

			if(isset($_GET['action'])){
				$this->action = $_GET['action'];
			}	
			else if(!isset($_GET['connexion'])){
				$this->action= "bienvenue";
			}				
		}

		public function form_connexion(){
        	$this->vue->form_connexion(); 
        }

        public function connexion(){
        	$this->modele->connexion();
        }
        
        public function deconnexion(){
        	$this->modele->deconnexion();
        }
	}
?>