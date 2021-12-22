<?php
class CompMenu{
    protected $controleur;

    public function __construct (){
        include 'cont_menu.php';
        $this->controleur = new ContMenu;
    }

    public function getControleur()
    {
        return $this->controleur;
    }
}
?>