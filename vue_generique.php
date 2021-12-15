<?php

	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');
		
	class VueGenerique {
		public function __construct () {
			ob_start();			
        }

		public function getAffichage(){
			return ob_get_clean();
		}
	}
?>