<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

require_once 'modele_generique.php';

class ModeleRecommandation extends ModeleGenerique {
    public function __construct(){
    }

    public function recupererDerniersAjouts() {
        $objRequete = self::$bdd->prepare("SELECT idVoiture, photo, nomVoiture, description FROM voiture NATURAL JOIN photo WHERE photo LIKE '%overview%' ORDER BY datemodif DESC LIMIT 4");
        $objRequete->execute();
        return $objRequete->fetchAll();
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
