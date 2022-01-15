<?php

if (!defined('CONST_INCLUDE'))
    die('Accès non-autorisé.');

class ModeleGenerique extends Connexion {
    public function __construct () {
    }

    //TOKEN
    public function createTocken(){
        //TOKEN
        if (!isset($_SESSION["token"])) {
            $_SESSION["token"] = bin2hex(random_bytes(2));
            //TOKEN EXPIRATION
            $_SESSION["token-expire"] = time() + 3600; // 1 heure = 3600 secs
        } /*else if (time() >= $_SESSION["token-expire"]) {
				$_SESSION["token"] = bin2hex(random_bytes(2));
				//TOKEN EXPIRATION
				$_SESSION["token-expire"] = time() + 10; // 1 heure = 3600 secs
			}*/
    }

    public function checktoken($tokenPost){
        //echo time() >= $_SESSION["token-expire"];
        if (!isset($tokenPost) || !isset($_SESSION["token"])) {
            echo "Le formulaire à expiré veuillez vous reconnecter!";
            return false;
        }else if ((time() < $_SESSION["token-expire"])!=1){
            echo "Le formulaire à expiré veuillez vous reconnecter!";
            return false;
        }else if ($tokenPost == $_SESSION["token"]) {
            //unset($_SESSION["token"]);
            //unset($_SESSION["token_expire"]);
            return true;
        }else{
            echo "Le formulaire à expiré veuillez vous reconnecter!";
            return false;
        }
    }
}
?>