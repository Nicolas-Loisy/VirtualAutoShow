<?php

    if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

    class ContGenerique {
        protected $modele;
        protected $vue;

        public function getVue() {
            return $this->vue;
        }

        /*
         * Fonction utile dans le cas où le module n'a pas besoin de feuille CSS pour s'afficher :
         * Lorsque template.php essayera d'appeler la méthode lienFeuilleCSS(), et bah null sera retourné (genre rien ne sera écrit)
         */
        public function lienFeuilleCSS() {
            return null;
        }
    }

?>