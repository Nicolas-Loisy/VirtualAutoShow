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
            <form action="index.php?module=Connexion&action=connecter" method="post">
                <p>Identifiant :</p>
                <input type="text" name="nomUtilisateur">
                <p>Mot de passe :</p>
                <input type="password" name="mdp">
                <p></p>
                <input type="submit" name="boutonEnvoie" value="Se connecter">
            </form>
            <a id="lienInscription" href=index.php?action=Connexion&action=inscription>Nouveau ? Inscrivez-vous ici</a>
            <?php
            
        }

        public function form_inscription() {
            ?>
            <form class="row g-3" action="index.php?module=Connexion&action=inscription" method="post">
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail">
                </div>
                <div class="col-md-6">
                    <label for="inputLogin" class="form-label">Login</label>
                    <input type="text" class="form-control" id="inputLogin">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword">
                </div>
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="inputName">
                </div>
                <div class="col-md-6">
                    <label for="inputNumber" class="form-label">Telephone</label>
                    <input type="number" class="form-control" id="inputNumber">
                </div>
                <div class="col-12">
                    <label for="inputAdresse" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAdresse">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>


            <?php

        }
    }
?>