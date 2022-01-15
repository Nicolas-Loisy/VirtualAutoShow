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
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
        </svg>
        <div class="row justify-content-center  alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div class="row justify-content-center" >Commentaire publié avec succès !</div>
        </div>
        <?php
    }

    public function sectionOverview($donneesPrincipaleVoiture) {
        ?>
        <h2 class="text-center"><?=$donneesPrincipaleVoiture["marque"]?> <?=$donneesPrincipaleVoiture["nomVoiture"]?></h2>
        <div class="container mt-4">
            <img src="img/imgVoiture/<?=$donneesPrincipaleVoiture["photo"]?>" alt="photoGeneralVoiture">
        </div>
        <?php
    }

    public function sectionHashtag($hashtagVoiture){
        ?>
        <div class="container mt-1">
            <p><strong>Hashtags associés : </strong> <?php $this->afficherHashtag($hashtagVoiture) ?></p>
        </div>
        <?php
    }

    private function afficherHashtag($hashtagVoiture) {
        foreach($hashtagVoiture as $cle => $value)
            echo $value["texte"] . " ";
    }

    public function sectionDescr($donneesPrincipaleVoiture) {
        ?>
        <div class="container mt-4">
            <p>
                <?=$donneesPrincipaleVoiture["description"]?>
            </p>
        </div>
        <?php
    }

    public function sectionCaracteristiques($donneesPrincipaleVoiture) {
        ?>
        <div class="container mt-4">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th colspan="2" class="table-light">Caractéristiques</th>
                </tr>
                <tr>
                    <th class="table-light" scope="row">Nombre de place</th>
                    <td><?=$donneesPrincipaleVoiture["nbPlace"]?></td>
                </tr>
                <tr>
                    <th class="table-light" scope="row">Poids</th>
                    <td><?=$donneesPrincipaleVoiture["poids"]?> kg</td>
                </tr>
                <tr>
                    <th class="table-light" scope="row">Volume coffre</th>
                    <td><?=$donneesPrincipaleVoiture["volumeCoffre"]?> L</td>
                </tr>
                <tr>
                    <th class="table-light" scope="row">Vitesse max.</th>
                    <td><?=$donneesPrincipaleVoiture["vitesseMax"]?> km/h</td>
                </tr>
                <tr>
                    <th class="table-light" scope="row">Autonomie</th>
                    <td><?=$donneesPrincipaleVoiture["autonomie"]?> km</td>
                </tr>
                <tr>
                    <th class="table-light" scope="row">Moteur</th>
                    <td><?=$donneesPrincipaleVoiture["moteur"]?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php
    }

    public function sectionPhotoDetails($photoDetailsVoiture) {
        ?>
        <div id="grille" class="mt-4">
            <div class="container">
                <div class="row row-cols-2">
                    <?php $this->afficherPhotoDetails($photoDetailsVoiture) ?>
                </div>
            </div>
        </div>
        <?php
    }

    private function afficherPhotoDetails($photoDetailsVoiture) {
        foreach($photoDetailsVoiture as $cle => $value) {
            ?>
            <div class="col d-flex align-items-center">
                <a href="img/imgVoiture/<?=$value["photo"]?>" class="my-3">
                    <img src="img/imgVoiture/<?=$value["photo"]?>" alt="photoDetailVoiture">
                </a>
            </div>
            <?php
        }
    }

    public function msgAucuneVoiture(){
        ?>
        <p class="text-center">Erreur : aucune voiture trouvée associée à cet id.</p>
        <?php
    }

    public function espace(){
        ?>
        <div class="my-5"></div>
        <?php
    }


}
?>