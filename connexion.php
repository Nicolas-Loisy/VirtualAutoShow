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
			// //self::$bdd = new PDO("mysql:host=database-etudiants.iut.univ-paris8.fr; dbname=dutinfopw201636; port=mon_port", "dutinfopw201636", "neqeragy");
			self::$bdd = new PDO("mysql:host=localhost; dbname=localprojweb6; port=3306", "root", "");

			self::$bdd->exec('SET CHARACTER SET utf8');
		}
	}
?>
	