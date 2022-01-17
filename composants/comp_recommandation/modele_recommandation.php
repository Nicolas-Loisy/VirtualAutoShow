<?php

    if (!defined('CONST_INCLUDE'))
        die('Accès non-autorisé.');

    require_once "connexion.php";
    require_once "modele_generique.php";

    class ModeleRecommandation extends ModeleGenerique {
        public function __construct(){
        }

        public function recupererHashtagsDesModelesLikees() {
            $reqHashtagVoiture = self::$bdd->prepare('SELECT * FROM utilisateur NATURAL JOIN suivremodele NATURAL JOIN estliee NATURAL JOIN hashtag WHERE login=?');
            $reqHashtagVoiture->execute(array($_SESSION['login']));
            return $reqHashtagVoiture->fetchAll();
        }

        public function recommandationSmart($resultHashtagVoiture){
            $rand_keys = array_rand($resultHashtagVoiture, 1);
            //echo $resultHashtagVoiture[$rand_keys]['texte'];
            $hashtag = $resultHashtagVoiture[$rand_keys]['texte'];

            $reqProposeVoiture = self::$bdd->prepare("SELECT idVoiture, photo, nomVoiture, description FROM voiture NATURAL JOIN estliee NATURAL JOIN hashtag NATURAL JOIN photo WHERE photo LIKE '%overview%' AND texte=? LIMIT 4");
            $reqProposeVoiture->execute(array($hashtag));
            return $reqProposeVoiture->fetchAll();
        }
    }
?>
