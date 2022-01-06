<?php

	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

    if (!isset($_SESSION['role'])) {
        die('Accès non-autorisé.');
    }else if ($_SESSION['role']!=2) {
        die('Accès non-autorisé.');
    }

	require_once 'cont_generique.php';
	include 'vue_administrationConstructeur.php';
	include 'modele_administrationConstructeur.php';

	class ContAdministrationConstructeur extends ContGenerique {
		public $action;
		
		public function __construct () {
			$this->vue = new VueAdministrationConstructeur();
			$this->modele = new ModeleAdministrationConstructeur();

			$this->vue->menu();

			if(isset($_GET['action'])){
				$this->action = $_GET['action'];
			}
			else if(!isset($_GET['action'])){
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
		            case "ajoutImageVoiture":
		                $this->form_ajoutImageVoiture();
		                break;
		            case "ajoutHashtag":
		                $this->form_ajoutHashtag();
		                break;
		            case "supprVoiture":
		                $this->form_supprVoiture();
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
			        case "ajoutImageVoiture":
			            $this->ajoutImageVoiture();
			            break;
			        case "ajoutHashtag":
			            $this->ajoutHashtag();
			            break;
			        case "supprVoiture":
			            $this->supprVoiture();
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

        //Ajout Image Voiture
		public function form_ajoutImageVoiture(){
        	$this->vue->form_ajoutImageVoiture(); 
        }
        public function ajoutImageVoiture(){
        	$this->modele->ajoutImageVoiture();
        }

        //Ajout Hashtag
		public function form_ajoutHashtag(){
        	$this->vue->form_ajoutHashtag(); 
        }
        public function ajoutHashtag(){
        	$this->modele->ajoutHashtag();
        }

        //Suppression Voiture
		public function form_supprVoiture(){
        	$this->vue->form_supprVoiture(); 
        }
        public function supprVoiture(){
        	$this->modele->supprVoiture();
        }
	}
?>