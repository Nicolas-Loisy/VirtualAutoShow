<?php

class VueCommentaire {
    public function __construct(){}

    public function form_commentaire() {
        ?>
        <div class="container px-2">
            <form id="align-form" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <input type="text" class="form-control" name="message" id="idMessage" msg cols="10" rows="5" maxlength="250" placeholder="Ajouter votre commentaire" required>
                </div>
                <button type="submit" value="Envoyer" class="btn btn-primary">Envoyer le commentaire</button>
            </form>
        </div>
        <?php
    }

    public function liste_commentaireVue($tab, $login, $role) {
        ?>
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="headings d-flex justify-content-between align-items-center mb-3">
                        <h5>Commentaires</h5>
                    </div>
                    <!-- Comment Row -->
                    <?php
                    if (count($tab) != 0) {
                        foreach ($tab as $key => $value) {
                            $this->affichage_commentaire($login, $role, $value['idCommentaire'], $value['login'], $value['contenu'], $value['datePublication']);
                        }
                    }

                    ?>
                </div>
            </div>
        </div>


        <?php

    }


    public function affichage_commentaire($login, $role, $id, $nom, $contenu, $date) {
        ?>
        <div class="card p-3 mt-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="user d-flex flex-row align-items-center">
                        <span>
                            <small class="font-weight-bold text-primary"><?=$nom?></small> 
                            <small class="font-weight-bold text-break" ><?=$contenu?></small>
                        </span>
                </div>
                <small><?=$date?></small>
            </div>
            <div class="action d-flex justify-content-between mt-2 align-items-center">
                <div class="reply px-4">
                    <?php
                    if ($login == $nom || $role == 3) {?>
                    <form action="?module=voiture" method="post">
                        <input type="hidden" id="idComm" name="commentaire" value=<?=$id?>>
                        <button type="submit" value="Envoyer" class="btn btn-primary btn-sm">Delete</button>
                    </form>

                    <?php
                    } ?>
                </div>
                <div class="icons align-items-center">
                    <i class="fa fa-check-circle-o check-icon text-primary"></i>
                </div>
            </div>
        </div>

        <?php

    }

    public function lienFeuilleCSS()  {
        ?>
        <link rel="stylesheet" type="text/css" href="modules/mod_voiture/mod_commentaires/styles.css">
        <?php
    }


}


?>

