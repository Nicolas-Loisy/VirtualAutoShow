<?php

	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

    if (!isset($_SESSION['role'])) {
        die('Accès non-autorisé.');
    }else if ($_SESSION['role']!=3) {
        die('Accès non-autorisé.');
    }

	require_once 'cont_generique.php';
	include 'vue_administration.php';
	include 'modele_administration.php';

	class ContAdministration extends ContGenerique {
		public $action;
		
		public function __construct () {
			$this->vue = new VueAdministration();
			$this->modele = new ModeleAdministration();

			$this->vue->menu();

			if(isset($_GET['action'])){
				$this->action = $_GET['action'];
			}
			else {
				$this->action= "ajoutVoiture";
			}


			if (!isset($_POST['nomModele'])) {
                switch ($this->action) {
		            case "ajoutVoiture":
		                $this->form_ajoutVoiture();
		                break;
		            case "modifVoiture":
		                $this->form_modifVoiture();
		                break;
		            case "supprVoiture":
		                $this->form_supprVoiture();
		                break;
		            case "ajoutConstructeur":
		                $this->form_ajoutConstructeur();
		                break;
		            case "modifResponsableConstructeur":
		                $this->form_modifResponsableConstructeur();
		                break;
		        }
            }else{
                switch ($this->action) {
		            case "ajoutVoiture":
		                $this->ajoutVoiture();
		                break;
		            case "modifVoiture":
			            $this->modifVoiture();
			            break;
			        case "supprVoiture":
			            $this->supprVoiture();
			            break;
			        case "ajoutConstructeur":
		                $this->ajoutConstructeur();
		                break;
		            case "modifResponsableConstructeur":
		                $this->modifResponsableConstructeur();
		                break;
            	}
            }

		}

		public function bienvenue(){
			?><p>Bienvenue!</p><?php
		}

		//Ajout Voiture
		public function form_ajoutVoiture(){
        	$this->vue->form_ajoutVoiture(); 
        }
        public function ajoutVoiture(){
        	$this->modele->ajoutVoiture();
        }

        //Modif Voiture
		public function form_modifVoiture(){
        	$this->vue->form_modifVoiture(); 
        }
        public function modifVoiture(){
        	$this->modele->modifVoiture();
        }

        //Suppression Voiture
		public function form_supprVoiture(){
        	$this->vue->form_supprVoiture(); 
        }
        public function supprVoiture(){
        	$this->modele->supprVoiture();
        }

        //Ajout Constructeur
        public function form_ajoutConstructeur(){
        	$this->vue->form_ajoutConstructeur();
        }
        public function ajoutConstructeur(){
        	$this->modele->ajoutConstructeur();
        }

        //Modif Responsable Constructeur
        public function form_modifResponsableConstructeur(){
        	$this->vue->form_modifResponsableConstructeur();
        }
        public function modifResponsableConstructeur(){
        	$this->modele->modifResponsableConstructeur();
        }

	}
?>