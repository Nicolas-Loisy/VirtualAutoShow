<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

class VueRecommandation {
    public function __construct (){
    }

    public function titreSectionRecommandation($titre)
    {
        ?>
        <div class="container">
            <div class="container border-bottom mb-3">
                <h2><?=$titre?></h2>
            </div>
        </div>
        <?php
    }

    public function ouvrirListe() {
        ?>
        <div class="container mb-5">
        <?php

    }

    public function genererUneVoiture($idVoiture, $photo, $nomVoiture, $description)
    {
        ?>
            <div class="row mb-3">
                <a href="index.php?module=voiture&idVoiture=<?=$idVoiture?>">

                    <div class="container">
                        <div class="row fond p-3">
                            <div class="col-6 col-md-4">
                                <img src="img/imgVoiture/<?=$photo?>" alt="imgVoiture">
                            </div>
                            <div class="col-6 col-md-8">
                                <h3><?=$nomVoiture?></h3>
                                <span class="descr">
                                    <?=$description?>
                                </span>
                            </div>
                        </div>
                    </div>

                </a>
            </div>
        <?php
    }

    public function fermetureListe()
    {
        ?>
        </div>
        <?php
    }

    public function lienFeuilleCSS()
    {
        ?>
        <link rel="stylesheet" type="text/css" href="composants/comp_recommandation/style.css">
        <?php
    }


}
?>

