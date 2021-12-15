
CREATE TABLE Utilisateur(
	idUtilisateur INT NOT NULL ,
	login         VARCHAR (25) NOT NULL UNIQUE,
	mdp           VARCHAR (25) NOT NULL ,
	nom           VARCHAR (25) NOT NULL ,
	numTel        INT   ,
	email         VARCHAR (50)  ,
	adresse       VARCHAR (50)  ,
	idRole        INT   ,
	CONSTRAINT prk_constraint_Utilisateur PRIMARY KEY (idUtilisateur)
);


CREATE TABLE Voiture(
	idVoiture      INT NOT NULL ,
	nomVoiture     VARCHAR (25) NOT NULL ,
	description    VARCHAR (1500)  ,
	nbPlace        INT   ,
	volume         INT   ,
	volumeCoffre   INT   ,
	vitesseMax     INT   ,
	autonomie      INT   ,
	moteur         VARCHAR (25)  ,
	idConstructeur INT  NOT NULL ,
	CONSTRAINT prk_constraint_Voiture PRIMARY KEY (idVoiture)
);



CREATE TABLE Constructeur(
	idConstructeur INT NOT NULL ,
	marque         VARCHAR (25) NOT NULL ,
	idUtilisateur  INT  NOT NULL ,
	CONSTRAINT prk_constraint_Constructeur PRIMARY KEY (idConstructeur)
);


CREATE TABLE Role(
	idRole  INT  NOT NULL ,
	nomRole VARCHAR (25)  ,
	CONSTRAINT prk_constraint_Role PRIMARY KEY (idRole)
);



CREATE TABLE Hashtag(
	idHashtag      INT NOT NULL ,
	texte          VARCHAR (25) NOT NULL UNIQUE,
	idConstructeur INT  NOT NULL ,
	CONSTRAINT prk_constraint_Hashtag PRIMARY KEY (idHashtag)
);



CREATE TABLE Commentaire(
	idCommentaire   INT NOT NULL ,
	datePublication DATE  NOT NULL ,
	contenu         VARCHAR (250)  ,
	idUtilisateur   INT  NOT NULL ,
	idVoiture       INT  NOT NULL ,
	idConstructeur  INT  ,
	CONSTRAINT prk_constraint_Commentaire PRIMARY KEY (idCommentaire)
);


CREATE TABLE Photo(
	idPhoto   INT NOT NULL ,
	photo     VARCHAR (25) NOT NULL ,
	idVoiture INT  NOT NULL ,
	CONSTRAINT prk_constraint_Photo PRIMARY KEY (idPhoto)
);



CREATE TABLE SuivreModele(
	idUtilisateur INT  NOT NULL ,
	idVoiture     INT  NOT NULL ,
	CONSTRAINT prk_constraint_SuivreModele PRIMARY KEY (idUtilisateur,idVoiture)
);



CREATE TABLE SuivreConstructeur(
	idUtilisateur  INT  NOT NULL ,
	idConstructeur INT  NOT NULL ,
	CONSTRAINT prk_constraint_SuivreConstructeur PRIMARY KEY (idUtilisateur,idConstructeur)
);


CREATE TABLE EstLiee(
	idVoiture INT  NOT NULL ,
	idHashtag INT  NOT NULL ,
	CONSTRAINT prk_constraint_EstLiee PRIMARY KEY (idVoiture,idHashtag)
);



ALTER TABLE Utilisateur ADD CONSTRAINT FK_Utilisateur_idRole FOREIGN KEY (idRole) REFERENCES Role(idRole);
ALTER TABLE Voiture ADD CONSTRAINT FK_Voiture_idConstructeur FOREIGN KEY (idConstructeur) REFERENCES Constructeur(idConstructeur);
ALTER TABLE Constructeur ADD CONSTRAINT FK_Constructeur_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur);
ALTER TABLE Hashtag ADD CONSTRAINT FK_Hashtag_idConstructeur FOREIGN KEY (idConstructeur) REFERENCES Constructeur(idConstructeur);
ALTER TABLE Commentaire ADD CONSTRAINT FK_Commentaire_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur);
ALTER TABLE Commentaire ADD CONSTRAINT FK_Commentaire_idVoiture FOREIGN KEY (idVoiture) REFERENCES Voiture(idVoiture);
ALTER TABLE Commentaire ADD CONSTRAINT FK_Commentaire_idConstructeur FOREIGN KEY (idConstructeur) REFERENCES Constructeur(idConstructeur);
ALTER TABLE Photo ADD CONSTRAINT FK_Photo_idVoiture FOREIGN KEY (idVoiture) REFERENCES Voiture(idVoiture);
ALTER TABLE SuivreModele ADD CONSTRAINT FK_SuivreModele_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur);
ALTER TABLE SuivreModele ADD CONSTRAINT FK_SuivreModele_idVoiture FOREIGN KEY (idVoiture) REFERENCES Voiture(idVoiture);
ALTER TABLE SuivreConstructeur ADD CONSTRAINT FK_SuivreConstructeur_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur);
ALTER TABLE SuivreConstructeur ADD CONSTRAINT FK_SuivreConstructeur_idConstructeur FOREIGN KEY (idConstructeur) REFERENCES Constructeur(idConstructeur);
ALTER TABLE EstLiee ADD CONSTRAINT FK_EstLiee_idVoiture FOREIGN KEY (idVoiture) REFERENCES Voiture(idVoiture);
ALTER TABLE EstLiee ADD CONSTRAINT FK_EstLiee_idHashtag FOREIGN KEY (idHashtag) REFERENCES Hashtag(idHashtag);
