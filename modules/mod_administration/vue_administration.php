<?php
    if (!defined('CONST_INCLUDE'))
        die('Accès non-autorisé.');

    require_once 'vue_generique.php';
    class VueAdministration extends VueGenerique{
        public function __construct () {
            parent::__construct();
        }

        public function menu(){
            ?>
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " href=?module=administration&action=ajoutVoiture>Ajout Voiture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=?module=administration&action=modifVoiture>Modification Voiture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=?module=administration&action=supprVoiture>Suppression Voiture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=?module=administration&action=ajoutConstructeur>Ajout Constructeur/Marque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=?module=administration&action=modifResponsableConstructeur>Modification responsable marque</a>
                    </li>
                </ul>  
            <?php   
        }

        public function form_ajoutVoiture(){
            ?>
            <div class="container px-2">    
                <form action="?module=administration&action=ajoutVoiture" method="post" enctype="multipart/form-data">
                    <?php 
                    if ($_SESSION['role']==3) { 
                    ?>
                        <div class="mb-3">
                            <label for="inputMarque" class="form-label">Marque voiture</label>
                            <input type="text" class="form-control" name="nomMarque" id="inputMarque" placeholder="Renault" required>
                        </div>
                    <?php 
                    } 
                    ?>

                    <div class="mb-3">
                        <label for="inputModele" class="form-label">Modèle voiture</label>
                        <input type="text" class="form-control" name="nomModele" id="inputModele" placeholder="Marque modèle 3" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="Description" id="inputDescription" rows="3" required></textarea>
                    </div>

                    <div class="row g-4">
                        <div class="form-group col-auto">
                            <label for="selNbPlace" class="form-label">Selection nombre de places</label>
                            <select class="form-control" name="nbPlace" id="selNbPlace">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <label for="inputPoids" class="form-label">Poids total voiture (kg)</label>
                            <input type="number" class="form-control" name="poids" id="inputPoids" required>
                        </div>

                        <div class="col-auto">
                            <label for="inputVolumeCoffre" class="form-label">Volume coffre (m3)</label>
                            <input type="number" class="form-control" name="volumeCoffre" id="inputVolumeCoffre" required>
                        </div>

                        <div class="col-auto">
                            <label for="inputVitesseMax" class="form-label">Vitesse max</label>
                            <input type="number" class="form-control" name="vitesseMax" id="inputVitesseMax" required>
                        </div>

                        <div class="col-auto">
                            <label for="inputAutonomie" class="form-label">Autonomie</label>
                            <input type="number" class="form-control" name="autonomie" id="inputAutonomie" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sel1" class="form-label">Selection moteur</label>
                        <select class="form-select" name="moteur" aria-label="Default select example">
                          <option selected>Ouvrir le menu de sélection</option>
                          <option value="Essence SP95">Essence SP95</option>
                          <option value="Essence SP98">Essence SP98</option>
                          <option value="Diesel">Diesel</option>
                          <option value="Electrique">Electrique</option>
                          <option value="Hybride">Hybride</option>
                          <option value="GPL">GPL</option>
                          <option value="E85">E85</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="MAX_FILE_SIZE" value="500000000"/>
                        <label for="formFile" class="form-label">Choisir une image </label>
                        <input class="form-control" type="file" name="image" id="formFile" required>
                    </div>
                    <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
                    <button type="submit" value="Envoyer" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
            <?php
        }

        public function form_modifVoiture(){
            ?>
            <div class="container px-2">    
                <form action="?module=administration&action=modifVoiture" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputModele" class="form-label">Modèle voiture</label>
                        <input type="text" class="form-control" name="nomModele" id="inputModele" placeholder="Indiquer le nom du modèle de la voiture à modifier" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="Description" id="inputDescription" rows="3" required></textarea>
                    </div>

                    <div class="row g-4">
                        <div class="form-group col-auto">
                          <label for="selNbPlace" class="form-label">Selection nombre de places</label>
                          <select class="form-control" name="nbPlace" id="selNbPlace">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                          </select>
                        </div>

                        <div class="col-auto">
                            <label for="inputPoids" class="form-label">Poids total voiture (kg)</label>
                            <input type="number" class="form-control" name="poids" id="inputPoids" required>
                        </div>

                        <div class="col-auto">
                            <label for="inputVolumeCoffre" class="form-label">Volume coffre (m3)</label>
                            <input type="number" class="form-control" name="volumeCoffre" id="inputVolumeCoffre" required>
                        </div>
                        
                        <div class="col-auto">
                            <label for="inputVitesseMax" class="form-label">Vitesse max</label>
                            <input type="number" class="form-control" name="vitesseMax" id="inputVitesseMax" required>
                        </div>

                        <div class="col-auto">
                            <label for="inputAutonomie" class="form-label">Autonomie</label>
                            <input type="number" class="form-control" name="autonomie" id="inputAutonomie" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sel1" class="form-label">Selection moteur</label>
                        <select class="form-select" name="moteur" aria-label="Default select example">
                          <option selected>Ouvrir le menu de sélection</option>
                          <option value="Essence SP95">Essence SP95</option>
                          <option value="Essence SP98">Essence SP98</option>
                          <option value="Diesel">Diesel</option>
                          <option value="Electrique">Electrique</option>
                          <option value="Hybride">Hybride</option>
                          <option value="GPL">GPL</option>
                          <option value="E85">E85</option>
                        </select>
                    </div>
                    <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
                    <button type="submit" value="Envoyer" class="btn btn-primary">Modifier</button>
                </form>
            </div>
            <?php
        }

        public function form_supprVoiture(){
            ?>
            <div class="container px-2">    
                <form action="?module=administration&action=supprVoiture" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputModele" class="form-label">Modèle voiture</label>
                        <input type="text" class="form-control" name="nomModele" id="inputModele" placeholder="Indiquer le modèle de la voiture à supprimer" required>
                    </div>                

                    <button type="button" value="Envoyer" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer</button>

                    <!-- MODAL -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Voulez-vous vraiment supprimer cette voiture?</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
                              <button type="submit" value="Envoyer" class="btn btn-danger">Supprimer</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
            <?php
        }

        public function form_ajoutConstructeur(){
            ?>
            <div class="container px-2">    
                <form action="?module=administration&action=ajoutConstructeur" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="inputModele" class="form-label">Marque</label>
                        <input type="text" class="form-control" name="marque" id="inputMarque" placeholder="Renault" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="inputLogin" class="form-label">Login utilisateur du responsable</label>
                        <input type="text" class="form-control" name="login" id="inputLogin" placeholder="Login" required>
                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="MAX_FILE_SIZE" value="500000000"/>
                        <label for="formFile" class="form-label">Choisir l'image du logo de la marque</label>
                        <input class="form-control" type="file" name="image" id="formFile" required>
                    </div>
                    <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
                    <button type="submit" value="Envoyer" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
            <?php
        }

        public function form_modifResponsableConstructeur(){
            ?>
            <div class="container px-2">    
                <form action="?module=administration&action=modifResponsableConstructeur" method="post" enctype="multipart/form-data">

                    <div class="mb-3 col-md-6">
                        <label for="inputModele" class="form-label">Marque</label>
                        <input type="text" class="form-control" name="marque" id="inputMarque" placeholder="Renault" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="inputLogin" class="form-label">Login utilisateur du nouveau responsable</label>
                        <input type="text" class="form-control" name="login" id="inputLogin" placeholder="Login" required>
                    </div>
                    <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
                    <button type="submit" value="Envoyer" class="btn btn-primary">Modifier</button>
                </form>
            </div>
            <?php
        }
    }
?>