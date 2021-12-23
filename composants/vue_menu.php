<!--    .=  est operateur d'affectation de concatenation       -->
<?php
class VueMenu{
    public $contenu;
    public function __construct (){
        $this->contenu = "<a href=index.php><h1>TP3</h1></a> <a href=index.php?module=Voiture&action=bienvenue>Voiture</a> <a href=index.php?module=listeVoiture&action=liste>Liste Voiture</a> <a href=index.php?module=administrationConstructeur>Administaration Constructeur</a>";
        if(isset($_SESSION['login'])){
            $this->contenu .= "<a href=index.php?module=Connexion&action=deconnexion>Deconnexion</a>\n";
        }
        else{
            $this->contenu .= "<a href=index.php?module=Connexion&action=connexion>Connexion</a>\n";
        }
    }
}
?>

