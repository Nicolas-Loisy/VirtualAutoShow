<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	class Connexion	{	
		protected static $bdd;

		public static function initConnexion()
		{
			self::$bdd = new PDO("mysql:host=localhost; dbname=VirtualAutoShow; port=3306", "root", "");
		}
	}
?>
	