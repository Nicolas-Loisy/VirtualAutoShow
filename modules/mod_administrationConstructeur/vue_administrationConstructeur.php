<?php
    if (!defined('CONST_INCLUDE'))
        die('Accès non-autorisé.');

    require_once 'vue_generique.php';
    class VueAdministrationConstructeur extends VueGenerique{
        public function __construct () {
            parent::__construct();
        }

        public function menu(){
            ?>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " href=index.php?module=administrationConstructeur&action=ajoutVoiture>Ajout Voiture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=index.php?module=administrationConstructeur&action=modifVoiture>Modification Voiture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=index.php?module=administrationConstructeur&action=ajoutImageVoiture>Ajout Image</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=index.php?module=administrationConstructeur&action=ajoutHashtag>Ajout Hashtag</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=index.php?module=administrationConstructeur&action=supprVoiture>Suppression Voiture</a>
                    </li>
                </ul>  
            <?php   
        }

        public function form_ajoutVoiture(){
            ?>
            <div class="container px-2">    
                <form action="index.php?module=administrationConstructeur&action=ajoutVoiture" method="post" enctype="multipart/form-data">
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
                            <label for="inputVolume" class="form-label">Volume total voiture (m3)</label>
                            <input type="number" class="form-control" name="volume" id="inputVolume" required>
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

                    <button type="submit" value="Envoyer" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
            <?php
        }

        public function form_modifVoiture(){
            ?>
            <div class="container px-2">    
                <form action="index.php?module=administrationConstructeur&action=modifVoiture" method="post" enctype="multipart/form-data">
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
                            <label for="inputVolume" class="form-label">Volume total voiture (m3)</label>
                            <input type="number" class="form-control" name="volume" id="inputVolume" required>
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

                    <button type="submit" value="Envoyer" class="btn btn-primary">Modifier</button>
                </form>
            </div>
            <?php
        }

        public function form_ajoutImageVoiture(){
            ?>
            <div class="container px-2">    
                <form action="index.php?module=administrationConstructeur&action=ajoutImageVoiture" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputModele" class="form-label">Modèle voiture</label>
                        <input type="text" class="form-control" name="nomModele" id="inputModele" placeholder="Indiquer le nom du modèle de la voiture où il faut ajouter l'image" required>
                    </div>
                    
                    <div class="mb-3">
                        <input type="hidden" name="MAX_FILE_SIZE" value="500000000"/>
                        <label for="formFile" class="form-label">Choisir une image </label>
                        <input class="form-control" type="file" name="image" id="formFile" required>
                    </div>                    

                    <button type="submit" value="Envoyer" class="btn btn-primary">Ajouter l'image</button>
                </form>
            </div>
            <?php
        }

        public function form_ajoutHashtag(){
            ?>
            <div class="container px-2">    
                <form action="index.php?module=administrationConstructeur&action=ajoutHashtag" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputModele" class="form-label">Modèle voiture</label>
                        <input type="text" class="form-control" name="nomModele" id="inputModele" placeholder="Indiquer le nom du modèle de la voiture où il faut ajouter l'hashtag" required>
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">#</span>
                        <input type="text" class="form-control" name="textHashtag" placeholder="Hashtag" aria-label="Hashtag" aria-describedby="basic-addon1" required>
                    </div>                   

                    <button type="submit" value="Envoyer" class="btn btn-primary">Ajouter l'hashtag</button>
                </form>
            </div>
            <?php
        }

        public function form_supprVoiture(){
            ?>
            <div class="container px-2">    
                <form action="index.php?module=administrationConstructeur&action=supprVoiture" method="post" enctype="multipart/form-data">
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
                            <button type="submit" value="Envoyer" class="btn btn-danger">Supprimer</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
            <?php
        }
    }
?>