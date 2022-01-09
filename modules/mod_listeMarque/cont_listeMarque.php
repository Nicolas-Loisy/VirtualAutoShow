<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once "cont_generique.php";
require_once "modules/mod_listeMarque/vue_listeMarque.php";
require_once "modules/mod_listeMarque/modele_listeMarque.php";

class ContListeMarque extends ContGenerique {
    public function __construct() {
        $this->modele = new ModeleListeMarque();
        $this->vue = new VueListeMarque();

        $this->genererGrilleDeLogos();
    }

    public function lienFeuilleCSS() {
        $this->vue->lienFeuilleCSS();
    }

    private function genererGrilleDeLogos() {
        // $logosConstructeurs un tableau DE TUPLES, donc tab en 2D
        $constructeursBD = $this->modele->recupererConstructeursBD();

        // Si il y a 0 images, on arrete la fonction
        if(count($constructeursBD) == 0)
            return;

        $this->vue->ouvrirGrilleBootstrap();

        foreach ($constructeursBD as $cle => $val) {
            $this->vue->genererColonneBootstrap($val["logoMarque"], $val["idConstructeur"]);
        }

        $this->vue->fermerGrilleBootstrap();
    }
}

?>