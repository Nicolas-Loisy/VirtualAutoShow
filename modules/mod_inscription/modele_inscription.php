<?php
    if (!defined('CONST_INCLUDE'))
        die('Accès non-autorisé.');

    require_once "connexion.php";

    class ModeleInscription extends Connexion {
        public function __construct(){}

        public function inscription() {
            $email = $_POST["inputEmail"];
            $login = $_POST["inputLogin"];
            $mdp = password_hash($_POST["inputPassword"], PASSWORD_DEFAULT);
            $nom = $_POST["inputName"];
            $numTel = $_POST["inputNumber"];
            $adresse = $_POST["inputAdresse"];

            $ajout = self::$bdd->prepare('INSERT INTO `Utilisateur` (`login`, `mdp`, `nom`, `numTel`, `email`, `adresse`, `idRole`) 
											VALUES (?, ?, ?, ?, ?, ?, 1)');

            $ajout->execute(array($login, $mdp, $nom, $numTel, $email, $adresse));

        }
    }

    ?>
