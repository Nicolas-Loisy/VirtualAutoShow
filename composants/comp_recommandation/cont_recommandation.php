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

        if(isset($_SESSION['login']))
            $this->recommanderParHashtag();
    }

    private function recommanderParHashtag() {
        $resultHashtagVoiture = $this->modele->recupererHashtagsDesModelesLikees();

        if(count($resultHashtagVoiture) == 0) {      // Si l'utilisateur connecté n'a liké aucun modèle de voiture, on affiche les derniers ajouts
            //$voitureReco = $this->modele->reco2;
        }
        else {
            $voitureReco = $this->modele->recommandationSmart($resultHashtagVoiture);

            $this->vue->ouvrirListe();
            foreach ($voitureReco as $cle => $val) {
                $this->vue->genererUneVoiture($val["idVoiture"], $val["photo"], $val["nomVoiture"], $val["description"]);
            }
            $this->vue->fermetureListe();
        }
    }

    public function lienFeuilleCSS() {
        $this->vue->lienFeuilleCSS();
    }
}
?>