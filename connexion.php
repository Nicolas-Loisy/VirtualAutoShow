<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	/*
	 *	version phpmyadmin iut : 4.6.6deb5ubuntu0.5
	 *	version serveur BD iut : 5.7.36-0ubuntu0.18.04.1 - (Ubuntu)
	 */
	class Connexion	{	
		protected static $bdd;


		public static function initConnexion(){
			//self::$bdd = new PDO("mysql:host=database-etudiants.iut.univ-paris8.fr; dbname=dutinfopw201632; port=mon_port", "dutinfopw201632", "jynuhuby");
			self::$bdd = new PDO("mysql:host=localhost; dbname=localprojweb; port=3306", "root", "");

			self::$bdd->exec('SET CHARACTER SET utf8');
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
	