<?php

    if (!defined('CONST_INCLUDE'))
        die('Accès non-autorisé.');

    require_once "connexion.php";
    require_once "modele_generique.php";

    class ModeleRecommandation extends ModeleGenerique {
        public function __construct(){
        }

        public function recommandationSmart(){
            $reqHashtagVoiture = self::$bdd->prepare('SELECT * FROM utilisateur NATURAL JOIN suivremodele NATURAL JOIN estliee NATURAL JOIN hashtag WHERE login=?');
            $reqHashtagVoiture->execute(array($_SESSION['login']));
            $resultHashtagVoiture = $reqHashtagVoiture->fetchAll();

            $rand_keys = array_rand($resultHashtagVoiture, 1);
            //echo $resultHashtagVoiture[$rand_keys]['texte'];
            $hashtag = $resultHashtagVoiture[$rand_keys]['texte'];

            $reqProposeVoiture = self::$bdd->prepare('SELECT * FROM voiture NATURAL JOIN estliee NATURAL JOIN hashtag NATURAL JOIN photo WHERE texte=? LIMIT 5');
            $reqProposeVoiture->execute(array($hashtag));
            return $reqProposeVoiture->fetchAll();
        }
    }
?>
