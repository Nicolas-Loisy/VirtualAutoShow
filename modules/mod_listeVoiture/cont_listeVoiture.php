<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'cont_generique.php';
include 'modules/mod_listeVoiture/vue_listeVoiture.php';
include 'modules/mod_listeVoiture/modele_listeVoiture.php';

class ContListeVoiture extends ContGenerique {

    public function __construct (){
        $this->vue = new VueListeVoiture();
        $this->modele = new ModeleListeVoiture();
    }

    public function lienFeuilleCSS() {
        $this->vue->lienFeuilleCSS();
    }

    public function genererListeDeVoiture($idConstr) {
        $voituresBD = $this->modele->recupererVoituresBD($idConstr);

        // Si il y a 0 voitures, on arrete la fonction
        if(count($voituresBD) == 0) {
            $this->vue->msgAucuneVoitureMarque();
            return;
        }

        $nomMarque = $this->modele->recupererNomConstr($idConstr);
        $this->vue->afficherConstructeur($nomMarque[0]["marque"]);
        $this->vue->ouvrirListe();

        foreach ($voituresBD as $cle => $val) {
            $this->vue->genererUneVoiture($val["idVoiture"], $val["photo"], $val["nomVoiture"], $val["description"]);
        }

        $this->vue->fermetureListe();
    }
}
?>