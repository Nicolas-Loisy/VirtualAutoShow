<?php

    if (!defined('CONST_INCLUDE'))
        die('Accès non-autorisé.');

    class ModGenerique {
        protected $controleur;

        public function getControleur() {
            return $this->controleur;
        }
    }

?>