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
        else
            $this->recommanderDerniersAjouts();
    }
    private function recommanderParHashtag() {
        $resultHashtagVoiture = $this->modele->recupererHashtagsDesModelesLikees();

        if(count($resultHashtagVoiture) == 0) {      // Si l'utilisateur connecté n'a liké aucun modèle de voiture, on affiche les derniers ajouts
            $this->recommanderDerniersAjouts();
        }
        else {
            $voitureReco = $this->modele->recommandationSmart($resultHashtagVoiture);

            $this->vue->titreSectionRecommandation("Recommandé pour vous");
            $this->vue->ouvrirListe();
            foreach ($voitureReco as $cle => $val) {
                $this->vue->genererUneVoiture($val["idVoiture"], $val["photo"], $val["nomVoiture"], $val["description"]);
            }
            $this->vue->fermetureListe();
        }
    }

    private function recommanderDerniersAjouts() {
        $voituresBD = $this->modele->recupererDerniersAjouts();

        $this->vue->titreSectionRecommandation("Derniers ajouts");
        $this->vue->ouvrirListe();
        foreach ($voituresBD as $cle => $val)
            $this->vue->genererUneVoiture($val["idVoiture"], $val["photo"], $val["nomVoiture"], $val["description"]);
        $this->vue->fermetureListe();
    }

    public function lienFeuilleCSS() {
        $this->vue->lienFeuilleCSS();
    }
}
?>