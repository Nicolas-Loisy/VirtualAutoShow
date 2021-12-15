<?php
	class CompMenu{
		public $cont_menu;
		public function __construct (){
			include 'cont_menu.php';
			$this->cont_menu = new ContMenu;
		}

		public function affiche(){
			echo $this->cont_menu->vue_menu->contenu;
		}
	}
?>