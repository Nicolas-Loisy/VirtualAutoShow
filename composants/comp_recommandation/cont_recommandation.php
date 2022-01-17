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

        $voitureReco = $this->modele->recommandationSmart();

        if(count($voitureReco) == 0) {
            //$voitureReco = $this->modele->reco2;
        }
        $this->vue->ouvrirListe();

        foreach ($voitureReco as $cle => $val) {
            $this->vue->genererUneVoiture($val["idVoiture"], $val["photo"], $val["nomVoiture"], $val["description"]);
        }
        $this->vue->fermetureListe();
    }


    public function lienFeuilleCSS() {
        $this->vue->lienFeuilleCSS();
    }
}
?>