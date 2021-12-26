<?php
    if (!defined('CONST_INCLUDE'))
	    die('Accès non-autorisé.');

    require_once 'vue_generique.php';
    class VueConnexion extends VueGenerique{
        public function __construct () {
            parent::__construct();
        }
        
        public function form_connexion(){
            ?>
            <form action="index.php?module=Connexion&action=connexion" method="post">
                <p>Identifiant :</p>
                <input type="text" name="nomUtilisateur">
                <p>Mot de passe :</p>
                <input type="password" name="mdp">
                <p></p>
                <input type="submit" name="boutonEnvoie" value="Se connecter">
            </form>
            <a class="nav-link" href="index.php?module=Connexion&action=inscription">Nouveau ? <br>Inscrivez-vous ici</a>
            <?php
            
        }



        public function form_inscription(){
            ?>
            <div class="container px-2">
                <form action="index.php?module=Connexion&action=inscription" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="inputEmail" id="idEmail" placeholder="exemple@exemple.exemple" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Login</label>
                        <input type="text" class="form-control" name="inputLogin" id="idLogin" placeholder="exemple: login123" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Mot de passe</label>
                        <input type="password" name="inputPassword" id="idPassword" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nom</label>
                        <input type="text" name="inputName" id="idName" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputNumber" class="form-label">Telephone</label>
                        <input type="number" name="inputNumber" id="idNumber" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputAdresse" class="form-label">Adresse</label>
                        <input type="text" name="inputAdresse" id="idAdresse" required>
                    </div>
                    <button type="submit" value="Envoyer" class="btn btn-primary">M'inscrire</button>
                </form>
            </div>
            <?php
        }

    }
?>