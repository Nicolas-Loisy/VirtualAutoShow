<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

class ModeleRecommandation extends Connexion {

    public function recupererDerniersAjouts()
    {
        $objRequete = self::$bdd->prepare("SELECT idVoiture, photo, nomVoiture, description FROM voiture NATURAL JOIN photo WHERE photo LIKE '%overview%' ORDER BY datemodif DESC LIMIT 4");
        $objRequete->execute();
        return $objRequete->fetchAll();
    }
}

?>
