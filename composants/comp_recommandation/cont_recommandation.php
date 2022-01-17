<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'modele_recommandation.php';
require_once 'vue_recommandation.php';

class ContRecommandation {
    protected $vue;
    protected $modele;

    public function __construct () {
        $this->vue = new VueRecommandation();
        $this->modele = new ModeleRecommandation();

        if(!isset($_SESSION['login'])) {
            $this->recommanderDerniersAjouts();
        }
    }

    private function recommanderDerniersAjouts() {
        $voituresBD = $this->modele->recupererDerniersAjouts();

        $this->vue->titreSectionRecommandation();
        $this->vue->ouvrirListe();
        foreach ($voituresBD as $cle => $val)
            $this->vue->genererUneVoiture($val["idVoiture"], $val["photo"], $val["nomVoiture"], $val["description"]);
        $this->vue->fermetureListe();

        // chez nico, si pas de voiture ou marque liké, appel à ma fonction
    }

    public function lienFeuilleCSS() {
        $this->vue->lienFeuilleCSS();
    }

}
?>