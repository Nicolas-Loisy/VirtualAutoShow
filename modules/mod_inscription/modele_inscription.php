<?php
    if (!defined('CONST_INCLUDE'))
        die('Accès non-autorisé.');

    require_once "connexion.php";
    require_once "modele_generique.php";

    class ModeleInscription extends ModeleGenerique {
        public function __construct(){}

        public function inscription() {
            $email = $_POST["inputEmail"];
            $login = $_POST["inputLogin"];
            $mdp = password_hash($_POST["inputPassword"], PASSWORD_DEFAULT);
            $nom = $_POST["inputName"];
            $numTel = $_POST["inputNumber"];
            $adresse = $_POST["inputAdresse"];

            $ajout = self::$bdd->prepare('INSERT INTO utilisateur (login, mdp, nom, numTel, email, adresse, idRole) VALUES (?, ?, ?, ?, ?, ?, 1)');

            $variable = $ajout->execute(array($login, $mdp, $nom, $numTel, $email, $adresse));
            //echo $variable;
            if ($variable != 1) {
                echo "Ce login est déja utilisé, essayez un autre.";
            }
            else {
                echo "Inscription accéptée.";
            }

        }

    }

    ?>
