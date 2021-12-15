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
            <?php
            
        }
    }
?>