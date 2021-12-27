<?php
    if (!defined('CONST_INCLUDE'))
      die('Accès non-autorisé.');

    require_once 'vue_generique.php';

    class VueInscription extends VueGenerique {
        public function __construct()
        {
            parent::__construct();
        }

        public function form_inscription(){
            ?>
            <div class="container px-2">
                <form action="index.php?module=Inscription&action=inscription" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="idEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="inputEmail" id="idEmail" placeholder="exemple@exemple.exemple" required>
                    </div>

                    <div class="mb-3">
                        <label for="idLogin" class="form-label">Login</label>
                        <input type="text" class="form-control" name="inputLogin" id="idLogin" placeholder="exemple: login123" required>
                    </div>

                    <div class="mb-3">
                        <label for="idPassword" class="form-label">Mot de passe</label>
                        <input type="password" name="inputPassword" id="idPassword" required>
                    </div>

                    <div class="mb-3">
                        <label for="idName" class="form-label">Nom</label>
                        <input type="text" name="inputName" id="idName" required>
                    </div>

                    <div class="mb-3">
                        <label for="idNumber" class="form-label">Telephone</label>
                        <input type="number" name="inputNumber" id="idNumber" required>
                    </div>

                    <div class="mb-3">
                        <label for="idAdresse" class="form-label">Adresse</label>
                        <input type="text" name="inputAdresse" id="idAdresse" required>
                    </div>
                    <button type="submit" value="Envoyer" class="btn btn-primary">M'inscrire</button>
                </form>
            </div>
            <?php
        }
    }

    ?>