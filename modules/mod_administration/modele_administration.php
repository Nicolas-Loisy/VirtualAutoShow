<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "connexion.php";
    require_once "modele_generique.php";

	class ModeleAdministration extends ModeleGenerique{
		public function __construct(){
		}

		public function ajoutVoiture(){
            if ($this->checktoken($_POST['token']) == true ) {

                if (isset($_FILES['image'])) {
                    $dossier = 'img/imgVoiture/';
                    $fichier = 'overview_' . basename($_FILES['image']['name']);

                    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                    $extension = strrchr($_FILES['image']['name'], '.');

                    //vérifications nécéssaires
                    if (!in_array($extension, $extensions)) {
                        echo 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
                        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
                        echo "1";
                    } else if (file_exists($dossier . $fichier)) {
                        echo 'Le fichier existe déjà. Veuillez renommer l\'image!';
                    } else {
                        //echo 'Le fichier n\'existe pas. ';
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) {
                            //echo 'Upload effectué avec succès !';
                            try {
                                $req = self::$bdd->prepare('INSERT INTO voiture(nomVoiture, description, nbPlace, poids, volumeCoffre, vitesseMax, autonomie, moteur, idConstructeur) VALUES (?,?,?,?,?,?,?,?,?)');

                                //role admin
                                if ($_SESSION['role'] == 3) {
                                    $reqIdConstru = self::$bdd->prepare('SELECT * FROM constructeur WHERE marque = ?');
                                    $reqIdConstru->execute(array($_POST['nomMarque']));

                                    $resultIdConstru = $reqIdConstru->fetch();
                                    //var_dump($resultIdConstru);
                                    //echo "id: ".$resultIdConstru['idConstructeur'];
                                    //echo $reqIdConstru->rowCount();

                                    if (is_null($resultIdConstru['idConstructeur'])) {
                                        //print "La marque n'existe pas dans la base de données.";
                                        throw new Exception("Erreur, la marque n'existe pas dans la base de données.", 1);
                                    }

                                    $req->execute(array($_POST['nomModele'], $_POST['Description'], $_POST['nbPlace'], $_POST['poids'], $_POST['volumeCoffre'], $_POST['vitesseMax'], $_POST['autonomie'], $_POST['moteur'], $resultIdConstru['idConstructeur']));
                                } else {
                                    //role constructeur
                                    $req->execute(array($_POST['nomModele'], $_POST['Description'], $_POST['nbPlace'], $_POST['poids'], $_POST['volumeCoffre'], $_POST['vitesseMax'], $_POST['autonomie'], $_POST['moteur'], $_SESSION['id_Constructeur']));
                                }

                                $req2 = self::$bdd->prepare('INSERT INTO photo(photo, idVoiture) VALUES (?,?)');
                                $req2->execute(array($fichier, self::$bdd->lastInsertId()));
                                //$req2->execute(array($fichier, 1));

                                echo "Ajout réussi!";
                                //redirection de la page apres 2sec
                                header("refresh:2; url=index.php?module=administration&action=ajoutVoiture");

                            } catch (Exception $e) {
                                unlink($dossier . $fichier);
                                die('Erreur : ' . $e->getMessage());
                            }

                        } else {
                            echo 'Echec de l\'upload !';
                        }

                        /*
                        echo "<br>nomImage ";
                        echo $fichier ;
                        echo "<br> titre ";
                                //echo $_POST['Titre'];
                        echo "<br>Lien ";
                                //echo $_POST['Lien'];
                        echo $dossier.$fichier;
                        echo '<img src='.$dossier.$fichier.' />';
                        */
                    }
                }
            }
		}

		public function modifVoiture(){
            if ($this->checktoken($_POST['token']) == true ) {
                try {
                    $reqIdUser = self::$bdd->prepare('SELECT * FROM voiture NATURAL JOIN constructeur WHERE nomVoiture = ?');
                    $reqIdUser->execute(array($_POST['nomModele']));
                    $resultIdUser = $reqIdUser->fetch();
                    //echo "id: ".$resultIdUser['idUtilisateur'];

                    if (is_null($resultIdUser['idUtilisateur'])) {
                        throw new Exception("Erreur, le modèle de voiture n'existe pas dans la base de données.", 1);
                    }

                    if ($resultIdUser['idUtilisateur'] != $_SESSION['id_user'] && $_SESSION['role'] != 3) {
                        echo "Vous n'avez pas les droits pour modifier ce modèle de voiture.";
                    } else {
                        $reqUpdateVoiture = self::$bdd->prepare('UPDATE voiture SET description=?, nbPlace=?, poids=?, volumeCoffre=?, vitesseMax=?, autonomie=?, moteur=? WHERE nomVoiture=? ');

                        $reqUpdateVoiture->execute(array($_POST['Description'], $_POST['nbPlace'], $_POST['poids'], $_POST['volumeCoffre'], $_POST['vitesseMax'], $_POST['autonomie'], $_POST['moteur'], $_POST['nomModele']));

                        echo "Modification effectuée.";

                        //redirection de la page apres 2sec
                        header("refresh:2; url=index.php?module=administration&action=modifVoiture");
                    }
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            }
		}

		public function supprVoiture(){
            if ($this->checktoken($_POST['token']) == true ) {
                try {
                    $reqId = self::$bdd->prepare('SELECT * FROM voiture NATURAL JOIN constructeur WHERE nomVoiture = ?');
                    $reqId->execute(array($_POST['nomModele']));
                    $resultId = $reqId->fetch();
                    //echo "id: ".$resultId['idUtilisateur'];

                    if (is_null($resultId['idUtilisateur'])) {
                        throw new Exception("Erreur, le modèle de voiture n'existe pas dans la base de données.", 1);
                    }

                    if ($resultId['idUtilisateur'] != $_SESSION['id_user'] && $_SESSION['role'] != 3) {
                        echo "Vous n'avez pas les droits pour supprimer ce modèle de voiture.";
                    } else {
                        $reqSuppHashtag = self::$bdd->prepare('DELETE FROM estliee WHERE idVoiture = ?');
                        $reqSuppHashtag->execute(array($resultId['idVoiture']));

                        $reqSuppFollow = self::$bdd->prepare('DELETE FROM suivremodele WHERE idVoiture = ?');
                        $reqSuppFollow->execute(array($resultId['idVoiture']));

                        $reqSuppComm = self::$bdd->prepare('DELETE FROM commentaire WHERE idVoiture = ?');
                        $reqSuppComm->execute(array($resultId['idVoiture']));

                        //Avant supp dans la BD supp les photos dans le dossier
                        $reqPhotoVoiture = self::$bdd->prepare('SELECT * FROM photo WHERE idVoiture = ?');
                        $reqPhotoVoiture->execute(array($resultId['idVoiture']));
                        $resultPhotoVoiture = $reqPhotoVoiture->fetchall();

                        $dossier = 'img/imgVoiture/';

                        try {
                            foreach ($resultPhotoVoiture as $row => $photo) {
                                unlink($dossier . $photo['photo']);
                            }
                        } catch (Exception $e) {
                            print "Error!: " . $e->getMessage() . "</br>";
                        }
                        $reqSuppPhoto = self::$bdd->prepare('DELETE FROM photo WHERE idVoiture = ?');
                        $reqSuppPhoto->execute(array($resultId['idVoiture']));

                        $reqSuppVoiture = self::$bdd->prepare('DELETE FROM voiture WHERE idVoiture = ?');
                        $reqSuppVoiture->execute(array($resultId['idVoiture']));

                        echo "Suppression réussi!";

                        //redirection de la page apres 2sec
                        header("refresh:2; url=index.php?module=administration&action=supprVoiture");
                    }
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            }
		}

		public function ajoutConstructeur(){
            if ($this->checktoken($_POST['token']) == true ) {
                if (isset($_FILES['image'])) {
                    $dossier = 'img/imgLogoMarque/';
                    $fichier = basename($_FILES['image']['name']);

                    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                    $extension = strrchr($_FILES['image']['name'], '.');

                    //vérifications nécéssaires
                    if (!in_array($extension, $extensions)) {
                        echo 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
                        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
                        echo "1";
                    } else if (file_exists($dossier . $fichier)) {
                        echo 'Le fichier existe déjà. Veuillez renommer l\'image!';
                    } else {
                        //echo 'Le fichier n\'existe pas. ';
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) {
                            //echo 'Upload effectué avec succès !';
                            try {
                                $req = self::$bdd->prepare('INSERT INTO constructeur(marque, logoMarque, idUtilisateur) VALUES (?,?,?)');

                                //verification si marque existe deja et Login valide
                                $reqMarque = self::$bdd->prepare('SELECT * FROM constructeur WHERE marque = ?');
                                $reqMarque->execute(array($_POST['marque']));
                                $resultMarque = $reqMarque->fetch();

                                if (!is_null($resultMarque['marque'])) {
                                    //print "La marque existe déjà dans la base de données.";
                                    throw new Exception("Erreur, la marque existe déjà dans la base de données.", 1);
                                }

                                $reqUtilisateur = self::$bdd->prepare('SELECT * FROM utilisateur WHERE login = ?');
                                $reqUtilisateur->execute(array($_POST['login']));
                                $resultUtilisateur = $reqUtilisateur->fetch();

                                if (is_null($resultUtilisateur['login'])) {
                                    throw new Exception("Erreur, le login n'existe pas dans la base de données.", 1);
                                }
                                if ($resultUtilisateur['idRole'] == 1) {
                                    $reqUpdateIdRole = self::$bdd->prepare('UPDATE utilisateur SET idRole = 2 WHERE login = ?');
                                    $reqUpdateIdRole->execute(array($_POST['login']));
                                }
                                $req->execute(array($_POST['marque'], $fichier, $resultUtilisateur['idUtilisateur']));

                                echo "Ajout réussi!";
                                //redirection de la page apres 2sec
                                header("refresh:2; url=index.php?module=administration&action=ajoutConstructeur");
                            } catch (Exception $e) {
                                unlink($dossier . $fichier);
                                die('Erreur : ' . $e->getMessage());
                            }

                        } else {
                            echo 'Echec de l\'upload !';
                        }
                    }
                }
            }
		}

		public function modifResponsableConstructeur(){
            if ($this->checktoken($_POST['token']) == true ) {
                try {
                    $req = self::$bdd->prepare('UPDATE constructeur SET idUtilisateur = ? WHERE marque = ?');

                    //verification si marque existe deja et Login valide
                    $reqMarque = self::$bdd->prepare('SELECT * FROM constructeur WHERE marque = ?');
                    $reqMarque->execute(array($_POST['marque']));
                    $resultMarque = $reqMarque->fetch();

                    if (is_null($resultMarque['marque'])) {
                        //print "La marque n'existe pas dans la base de données.";
                        throw new Exception("Erreur, la marque n'existe pas dans la base de données.", 1);
                    }

                    $reqUtilisateur = self::$bdd->prepare('SELECT * FROM utilisateur WHERE login = ?');
                    $reqUtilisateur->execute(array($_POST['login']));
                    $resultUtilisateur = $reqUtilisateur->fetch();

                    if (is_null($resultUtilisateur['login'])) {
                        throw new Exception("Erreur, le login n'existe pas dans la base de données.", 1);
                    }

                    //update role utilisateur a constructeur
                    if ($resultUtilisateur['idRole'] == 1) {
                        $reqUpdateIdRole = self::$bdd->prepare('UPDATE utilisateur SET idRole = 2 WHERE login = ?');
                        $reqUpdateIdRole->execute(array($_POST['login']));
                    }
                    $req->execute(array($resultUtilisateur['idUtilisateur'], $_POST['marque']));
                    //update role utilisateur a DroitUtilisateur s'il n'est plus responsable d'aucune marque
                    $reqPrecResponsable = self::$bdd->prepare('SELECT * FROM constructeur WHERE idUtilisateur = ?');
                    $reqPrecResponsable->execute(array($resultMarque['idUtilisateur']));
                    $resultPrecResponsable = $reqPrecResponsable->fetch();

                    //recup role prec responsable constructeur
                    $reqCheckRolePrec = self::$bdd->prepare('SELECT * FROM utilisateur WHERE idUtilisateur = ?');
                    $reqCheckRolePrec->execute(array($resultMarque['idUtilisateur']));
                    $resultCheckRolePrec = $reqCheckRolePrec->fetch();

                    if ($resultCheckRolePrec['idRole'] == 2) {
                        if (is_null($resultPrecResponsable['marque'])) {
                            $reqUpdateIdRolePreced = self::$bdd->prepare('UPDATE utilisateur SET idRole = 1 WHERE idUtilisateur = ?');
                            $reqUpdateIdRolePreced->execute(array($resultMarque['idUtilisateur']));
                        }
                    }
                    echo "Mise à jour réussi!";
                    //redirection de la page apres 2sec
                    header("refresh:2; url=index.php?module=administration&action=modifResponsableConstructeur");
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            }
		}

	}	
?>