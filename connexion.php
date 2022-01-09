<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	class Connexion	{	
		protected static $bdd;


		public static function initConnexion(){
			//self::$bdd = new PDO("mysql:host=database-etudiants.iut.univ-paris8.fr; dbname=dutinfopw201632; port=mon_port", "dutinfopw201632", "jynuhuby");
			self::$bdd = new PDO("mysql:host=localhost; dbname=localprojweb; port=3306", "root", "");

			self::$bdd->exec('SET CHARACTER SET utf8');
		}
	}
?>
	