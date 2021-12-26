<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "connexion.php";

	class ModeleConnexion extends Connexion{
		public function __construct(){
		}

		public function deconnexion(){
			unset($_SESSION['login']);
			echo "Vous êtes déconnecté!";
		}

		public function inscription() {
			$email = $_POST["inputEmail"];
			$login = $_POST["inputLogin"];
			$mdp = $_POST["inputPassword"];
			$nom = $_POST["inputName"];
			$numTel = $_POST["inputNumber"];
			$adresse = $_POST["inputAdresse"];

		}

		public function connexion(){
			$identifiant = $_POST["nomUtilisateur"];
			$psswd = $_POST["mdp"];

			$requete = self::$bdd->prepare('SELECT id_user, pwd_user FROM testUser WHERE log_user=?');
			$requete->execute(array($identifiant));
			$resultat = $requete->fetch();

	         // Comparaison du pass envoyé via le formulaire avec la base

	         //echo $psswd;
	         //echo $resultat['pwd_user'];
			$isPasswordCorrect = password_verify($psswd, $resultat['pwd_user']);

			if (!$resultat){
				echo 'Mauvais identifiant ou mot de passe ! [erreur 1]';
			}
			else{
				if ($isPasswordCorrect) {
					$_SESSION['id_user'] = $resultat['id_user'];
					$_SESSION['login'] = $identifiant;
					echo 'Vous êtes connecté !<br>';

					if (isset($_SESSION['id_user']) AND isset($_SESSION['log_user'])){
						echo 'Bonjour ' . $_SESSION['log_user'];
					}  
				}
				else{
					echo 'Mauvais identifiant ou mot de passe ! [erreur 2]';
				}
			}
		}
	}
?>





