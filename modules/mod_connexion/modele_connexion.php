<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "connexion.php";

	class ModeleConnexion extends Connexion{
		public function __construct(){
		}

		public function deconnexion(){
			unset($_SESSION['login']);
			unset($_SESSION['id_user']);
			unset($_SESSION['role']);
			unset($_SESSION['id_Constructeur']);

			//echo "Vous êtes déconnecté!";
			?>
			<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
				<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
					<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
				</symbol>
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
				<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
					<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
				</symbol>
			</svg>
			<div class="row justify-content-center  alert alert-success d-flex align-items-center" role="alert">
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
				<div class="row justify-content-center" >Vous êtes déconnecté !</div>
			</div>
			<?php


		}

		public function connexion(){
			$identifiant = $_POST["nomUtilisateur"];
			$psswd = $_POST["mdp"];

			$requete = self::$bdd->prepare('SELECT * FROM utilisateur LEFT JOIN constructeur ON utilisateur.idUtilisateur = constructeur.idUtilisateur WHERE login = ?');
			$requete->execute(array($identifiant));
			$resultat = $requete->fetch();

	         // Comparaison du pass envoyé via le formulaire avec la base

	         //echo $psswd;
	         //echo $resultat['pwd_user'];
			$isPasswordCorrect = password_verify($psswd, $resultat['mdp']);

			if (!$resultat){
				//echo 'Mauvais identifiant ou mot de passe ! [erreur 1]';
				?>
				<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
					<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
						<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
					</symbol>
				</svg>
				<div class="row justify-content-center alert alert-danger d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
					<div class="row justify-content-center">Mauvais identifiant ou mot de passe !</div>
				</div>
				<?php
			}else{
				if ($isPasswordCorrect) {
					$_SESSION['login'] = $resultat['login'];
					$_SESSION['id_user'] = $resultat['idUtilisateur'];
					$_SESSION['role'] = $resultat['idRole'];
					if ($_SESSION['role'] == 2){
						$_SESSION['id_Constructeur'] = $resultat['idConstructeur'];
					}

					?>
					<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
						<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
							<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
						</symbol>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
						<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
							<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
						</symbol>
					</svg>
					<div class="row justify-content-center  alert alert-success d-flex align-items-center" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  						<div class="row justify-content-center" >Vous êtes connecté !</div>
					</div>
					<p class="h1 row justify-content-center">Bonjour <?php echo $_SESSION['login']; ?> !</p>
					<?php

					//echo 'Bonjour ' . $_SESSION['login'] . ' !';
					//echo '<br>Vous êtes connecté !<br>';
				}
				else{
					//echo 'Mauvais identifiant ou mot de passe ! [erreur 2]';
					?>
					<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
						<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
							<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</symbol>
					</svg>
					<div class="row justify-content-center alert alert-danger d-flex align-items-center" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
						<div class="row justify-content-center">Mauvais identifiant ou mot de passe !</div>
					</div>
					<?php
				}
			}
		}
	}
?>





