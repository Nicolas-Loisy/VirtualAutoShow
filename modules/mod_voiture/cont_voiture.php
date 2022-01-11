<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'cont_generique.php';
include 'vue_voiture.php';
include 'modele_voiture.php';

class ContVoiture extends ContGenerique {

    public function __construct () {
        $this->vue = new VueVoiture();
        $this->modele = new ModeleVoiture();

        // Appeller les méthodes du controlleur dans le constructeur ou dans le module, c'est pareil, pas d'importance.
        $this->presGeneralVoiture();
        $this->caracteristiques();
        $this->photoDetails();
    }

    public function lienFeuilleCSS() {
        return $this->vue->lienFeuilleCSS();
    }

    public function presGeneralVoiture() {
        if (isset($_POST['message']))
            $this->vue->bandeauConfirmationPublicCom();

        $this->vue->sectionOverview();
        $this->vue->sectionDescr();
    }

    public function caracteristiques() {
        $this->vue->sectionCaracteristiques();
    }

    public function photoDetails() {
        $this->vue->sectionPhotoDetails();
    }
}
?>