<?php

    if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

    class ContGenerique {
        protected $modele;
        protected $vue;

        public function getVue() {
            return $this->vue;
        }
    }

?>