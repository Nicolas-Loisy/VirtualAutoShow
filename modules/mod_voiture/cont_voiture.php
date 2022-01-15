<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'cont_generique.php';
include 'vue_voiture.php';
include 'modele_voiture.php';

// Appeler les méthodes du controleur dans le constructeur ou dans le module, c'est pareil, pas d'importance.
class ContVoiture extends ContGenerique {

    public function __construct () {
        $this->vue = new VueVoiture();
        $this->modele = new ModeleVoiture();

        if (isset($_POST['message']))
            $this->vue->bandeauConfirmationPublicCom();

        // Récupération des données dans la BD
        $donneesPrincipaleVoiture = $this->modele->getDonneesVoiturePrincipale();
        if (!$donneesPrincipaleVoiture) {       // $donneesPrincipaleVoiture vide = booléen à faux
            $this->vue->msgAucuneVoiture();
            return;
        }
        $hashtagVoiture = $this->modele->getHashtagVoit();
        $photoDetailsVoiture = $this->modele->getPhotoDetails();

        // Affichage des infos
        $this->vue->sectionOverview($donneesPrincipaleVoiture);
        if (count($hashtagVoiture)>0)
            $this->vue->sectionHashtag($hashtagVoiture);
        $this->vue->sectionDescr($donneesPrincipaleVoiture);
        $this->vue->sectionCaracteristiques($donneesPrincipaleVoiture);
        if (count($photoDetailsVoiture)>0)
            $this->vue->sectionPhotoDetails($photoDetailsVoiture);
        $this->vue->espace();
    }

    public function lienFeuilleCSS() {
        $this->vue->lienFeuilleCSS();
    }
}
?>