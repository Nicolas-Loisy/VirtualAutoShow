<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'vue_generique.php';
class VueVoiture extends VueGenerique{
    public function __construct () {
        parent::__construct();
    }

    public function lienFeuilleCSS()
    {
        ?>
        <link rel="stylesheet" type="text/css" href="modules/mod_voiture/style.css">
        <?php
    }

    public function bandeauConfirmationPublicCom() {
        ?>

        <?php
    }

    public function sectionOverview() {
        ?>

        <?php
    }

    public function sectionDescr() {
        ?>

        <?php
    }

    public function sectionCaracteristiques() {
        ?>

        <?php
    }

    public function sectionPhotoDetails() {
        ?>

        <?php
    }

    
}
?>