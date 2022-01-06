<?php
	if (!defined('CONST_INCLUDE'))
		die('Accès non-autorisé.');

	require_once "connexion.php";
	class ModeleAdministrationConstructeur extends Connexion{
		public function __construct(){
		}

		public function ajoutVoiture(){
			if(isset($_FILES['image'])){
				$dossier = 'images_annonces/';
				$fichier = basename($_FILES['image']['name']);

				$extensions = array('.png', '.gif', '.jpg', '.jpeg');
				$extension = strrchr($_FILES['image']['name'], '.');

			          //vérifications nécéssaires
				if(!in_array($extension, $extensions)){
					echo'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
					$erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
					echo "1";
				}else if(file_exists($dossier.$fichier)){
					echo 'Le fichier existe déjà. Veuillez renommer l\'image!';
				}else{
			        //echo 'Le fichier n\'existe pas. ';
					if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$fichier)){
			        //echo 'Upload effectué avec succès !';
						try{
							try{
								self::$bdd->beginTransaction();

								$req = self::$bdd->prepare('INSERT INTO Voiture(nomVoiture, description, nbPlace, poids, volumeCoffre, vitesseMax, autonomie, moteur, idConstructeur) VALUES (?,?,?,?,?,?,?,?,?)');

			                         //role admin
								if ($_SESSION['role']==3){    
									$reqIdConstru = self::$bdd->prepare('SELECT * FROM constructeur WHERE marque = ?');
									$reqIdConstru->execute(array($_POST['nomMarque']));

									$resultIdConstru = $reqIdConstru->fetch();

			                              //var_dump($resultIdConstru);
									echo "id: ".$resultIdConstru['idConstructeur'];
			                              //echo $reqIdConstru->rowCount();

									if (is_null($resultIdConstru['idConstructeur'])) {
			                                   //print "La marque n'existe pas dans la base de données.";
										throw new Exception("Erreur, la marque n'existe pas dans la base de données.", 1);         
									}

									$req->execute(array($_POST['nomModele'],$_POST['Description'],$_POST['nbPlace'],$_POST['poids'],$_POST['volumeCoffre'],$_POST['vitesseMax'],$_POST['autonomie'],$_POST['moteur'], $resultIdConstru['idConstructeur']));
								}else{
			                         //role constructeur                                                                                                                                                                // erreur ici peut-etre
									$req->execute(array($_POST['nomModele'],$_POST['Description'],$_POST['nbPlace'],$_POST['poids'],$_POST['volumeCoffre'],$_POST['vitesseMax'],$_POST['autonomie'],$_POST['moteur'],$_SESSION['id_user']));
								}

								$req2 = self::$bdd->prepare('INSERT INTO Photo(photo, idVoiture) VALUES (?,?)');
								$req2->execute(array($fichier, self::$bdd->lastInsertId()));
			                         //$req2->execute(array($fichier, 1));
			
								echo "Ajout réussi!";

								//redirection de la page apres 2sec
					            header( "refresh:2; url=index.php?module=administrationConstructeur&action=ajoutVoiture" );
			
							}catch(PDOException $e){
								self::$bdd->rollback();
								unlink($dossier.$fichier);
								print "Error!: " . $e->getMessage() . "</br>";
							}

						}catch(Exception $e){
							unlink($dossier.$fichier);
							die('Erreur : '.$e->getMessage());
						}

					}else{
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

		public function modifVoiture(){
			try{
			    $reqIdUser = self::$bdd->prepare('SELECT * FROM voiture NATURAL JOIN constructeur WHERE nomVoiture = ?');
			    $reqIdUser->execute(array($_POST['nomModele']));
			    $resultIdUser = $reqIdUser->fetch();
			    //echo "id: ".$resultIdUser['idUtilisateur'];

			    if (is_null($resultIdUser['idUtilisateur'])) {
			        throw new Exception("Erreur, le modèle de voiture n'existe pas dans la base de données.", 1);  
			    }

			    if ($resultIdUser['idUtilisateur'] != $_SESSION['id_user'] && $_SESSION['role']!=3) {
			        echo "Vous n'avez pas les droits pour modifier ce modèle de voiture.";
			    }else{
			        try{
			            self::$bdd->beginTransaction();
			            $reqUpdateVoiture = self::$bdd->prepare('UPDATE Voiture SET description=?, nbPlace=?, poids=?, volumeCoffre=?, vitesseMax=?, autonomie=?, moteur=? WHERE nomVoiture=? ');

			            $reqUpdateVoiture->execute(array($_POST['Description'],$_POST['nbPlace'],$_POST['poids'],$_POST['volumeCoffre'],$_POST['vitesseMax'],$_POST['autonomie'],$_POST['moteur'],$_POST['nomModele']));

			            echo "Modification effectuée.";

			            //redirection de la page apres 2sec
			            header( "refresh:2; url=index.php?module=administrationConstructeur&action=modifVoiture" );
			        }catch(PDOException $e){
			            self::$bdd->rollback();
			            print "Error!: " . $e->getMessage() . "</br>";
			        }
			    }
			}catch(Exception $e){   
			    die('Erreur : '.$e->getMessage());
			}
		}

		public function ajoutImageVoiture(){
			try{
			    $reqIdUser = self::$bdd->prepare('SELECT * FROM voiture NATURAL JOIN constructeur WHERE nomVoiture = ?');
			    $reqIdUser->execute(array($_POST['nomModele']));
			    $resultIdUser = $reqIdUser->fetch();
			    //echo "id: ".$resultIdUser['idUtilisateur'];

			    if(is_null($resultIdUser['idUtilisateur'])) {
			        throw new Exception("Erreur, le modèle de voiture n'existe pas dans la base de données.", 1);  
			    }

			    if ($resultIdUser['idUtilisateur'] != $_SESSION['id_user']) {
			        echo "Vous n'avez pas les droits pour ajouter une image à ce modèle de voiture.";
			    }else{
			        if(isset($_FILES['image'])){
			            $dossier = 'images_annonces/';
			            $fichier = basename($_FILES['image']['name']);

			            $extensions = array('.png', '.gif', '.jpg', '.jpeg');
			            $extension = strrchr($_FILES['image']['name'], '.');

			            //vérifications nécéssaires
			            if(!in_array($extension, $extensions)){
			                echo'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
			                $erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
			                echo "1";
			            }else if(file_exists($dossier.$fichier)){
			                echo 'Le fichier existe déjà. Veuillez renommer l\'image!';
			            }else{
			                //echo 'Le fichier n\'existe pas. ';
			                if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$fichier)){
			                    //echo 'Upload effectué avec succès !';
			                    try{
			                        $reqIdVoiture = self::$bdd->prepare('SELECT * FROM voiture WHERE nomVoiture = ?');
			                        $reqIdVoiture->execute(array($_POST['nomModele']));
			                        $resultIdVoiture = $reqIdVoiture->fetch();
			                        //echo "id: ".$resultIdVoiture['idVoiture'];

		                            self::$bdd->beginTransaction();     
		                            $req2 = self::$bdd->prepare('INSERT INTO Photo(photo, idVoiture) VALUES (?,?)');
		                            $req2->execute(array($fichier, $resultIdVoiture['idVoiture']));

		                            echo "Ajout de l'image réussi!";

		                            //redirection de la page apres 2sec
			            			header( "refresh:2; url=index.php?module=administrationConstructeur&action=ajoutImageVoiture" );
			                    }catch(PDOException $e){
			                        self::$bdd->rollback();
			                        unlink($dossier.$fichier);
			                        print "Error!: " . $e->getMessage() . "</br>";
			                    }
			                }
			       	    }
				    }     
			    }     
			}catch(Exception $e){   
			    die('Erreur : '.$e->getMessage());
			}
		}

		public function ajoutHashtag(){
			try{
			    $reqIdUser = self::$bdd->prepare('SELECT * FROM voiture NATURAL JOIN constructeur WHERE nomVoiture = ?');
			    $reqIdUser->execute(array($_POST['nomModele']));
			    $resultIdUser = $reqIdUser->fetch();
			    //echo "id: ".$resultIdUser['idUtilisateur'];

			    if(is_null($resultIdUser['idUtilisateur'])) {
			        throw new Exception("Erreur, le modèle de voiture n'existe pas dans la base de données.", 1);  
			    }

			    if (1==2/*$resultIdUser['idUtilisateur'] != $_SESSION['id_user']*/) {
			        echo "Vous n'avez pas les droits pour ajouter un hashtag à ce modèle de voiture.";
			    }else{
			        try{
			            $reqIdConstructeur = self::$bdd->prepare('SELECT * FROM voiture WHERE nomVoiture = ?');
			            $reqIdConstructeur->execute(array($_POST['nomModele']));
			            $resultIdConstructeur = $reqIdConstructeur->fetch();

			            $reqHashtag = self::$bdd->prepare('SELECT * FROM hashtag WHERE texte = ? /*AND idConstructeur = ?*/');
		               	$reqHashtag->execute(array('#'.$_POST['textHashtag']/*, $resultIdConstructeur['idConstructeur']*/));
			            $resultHashtag = $reqHashtag->fetch();

		    	        if (is_null($resultHashtag['texte'])){
		                    //echo "L'hashtag n'existe pas";
		 
		                    self::$bdd->beginTransaction();     
		                    $req2 = self::$bdd->prepare('INSERT INTO hashtag(texte, idConstructeur) VALUES (?,?)');
		                    $req2->execute(array('#'.$_POST['textHashtag'], $resultIdConstructeur['idConstructeur']));
		                    
		                    $req3 = self::$bdd->prepare('INSERT INTO estliee(idVoiture, idHashtag) VALUES (?,?)');
		                    $req3->execute(array($resultIdConstructeur['idVoiture'], self::$bdd->lastInsertId()));
		            	}else{
		        	        //echo "L'hashtag existe déjà! ";

		                    self::$bdd->beginTransaction();  
		                    $req3 = self::$bdd->prepare('INSERT INTO estliee(idVoiture, idHashtag) VALUES (?,?)');
		                    $req3->execute(array($resultIdConstructeur['idVoiture'], $resultHashtag['idHashtag']));
		               	}

			            echo "Ajout de l'hashtag réussi!";

			            //redirection de la page apres 2sec
			            header( "refresh:2; url=index.php?module=administrationConstructeur&action=ajoutHashtag" );
			        }catch(PDOException $e){
			            self::$bdd->rollback();
			            print "Error!: " . $e->getMessage() . "</br>";
			        }        
			    }     
			}catch(Exception $e){   
			    die('Erreur : '.$e->getMessage());
			}
		}

		public function supprVoiture(){
			try{
			    $reqId = self::$bdd->prepare('SELECT * FROM voiture NATURAL JOIN constructeur WHERE nomVoiture = ?');
			    $reqId->execute(array($_POST['nomModele']));
			    $resultId = $reqId->fetch();
			    //echo "id: ".$resultId['idUtilisateur'];

			    if (is_null($resultId['idUtilisateur'])) {
			        throw new Exception("Erreur, le modèle de voiture n'existe pas dans la base de données.", 1);  
			    }

			    if ($resultId['idUtilisateur'] != $_SESSION['id_user'] && $_SESSION['role']!=3) {
			        echo "Vous n'avez pas les droits pour supprimer ce modèle de voiture.";
			    }else{
			        try{ 
			            self::$bdd->beginTransaction();
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

			            $dossier = 'images_annonces\\';

			            try {
			                foreach($resultPhotoVoiture as $row => $photo){
			                    unlink($dossier.$photo['photo']);
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
			            header( "refresh:2; url=index.php?module=administrationConstructeur&action=supprVoiture" );
			        }catch(PDOException $e){
                        self::$bdd->rollback();
			            print "Error!: " . $e->getMessage() . "</br>";
			        }        
			    }     
			}catch(Exception $e){   
			    die('Erreur : '.$e->getMessage());
			}
		}

	}	
?>