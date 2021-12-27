<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

class ModeleListeMarque extends Connexion {
    public function __construct() {

    }

    public function recupererLogosConstructeurs() {
        $objRequete = self::$bdd->prepare("SELECT logoMarque FROM Constructeur ORDER BY marque");
        $objRequete->execute();
        $tuples = $objRequete->fetchAll();
        return $tuples;
    }

/*    public function nbTuplesDernierPrepare() {
        $objRequete = self::$bdd->prepare("SELECT logoMarque FROM Constructeur");
        $objRequete->execute();
        return $objRequete->rowCount();
    }*/
}
