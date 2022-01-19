
CREATE TABLE utilisateur(
	idUtilisateur INT NOT NULL ,
	login         VARCHAR (25) NOT NULL UNIQUE,
	mdp           VARCHAR (150) NOT NULL ,
	nom           VARCHAR (25) NOT NULL ,
	numTel        INT   ,
	email         VARCHAR (50)  ,
	adresse       VARCHAR (50)  ,
	idRole        INT   ,
	CONSTRAINT prk_constraint_utilisateur PRIMARY KEY (idUtilisateur)
);


CREATE TABLE voiture(
	idVoiture      INT NOT NULL ,
	nomVoiture     VARCHAR (25) NOT NULL ,
	description    VARCHAR (1500)  ,
	nbPlace        INT   ,
	poids		   INT   ,
	volumeCoffre   INT   ,
	vitesseMax     INT   ,
	autonomie      INT   ,
	moteur         VARCHAR (25)  ,
	idConstructeur INT  NOT NULL ,
	CONSTRAINT prk_constraint_voiture PRIMARY KEY (idVoiture)
);



CREATE TABLE constructeur(
	idConstructeur INT NOT NULL ,
	marque         VARCHAR (25) NOT NULL ,
	logoMarque     VARCHAR (125) NOT NULL ,
	idUtilisateur  INT  NOT NULL ,
	CONSTRAINT prk_constraint_constructeur PRIMARY KEY (idConstructeur)
);


CREATE TABLE role(
	idRole  INT  NOT NULL ,
	nomRole VARCHAR (25)  ,
	CONSTRAINT prk_constraint_role PRIMARY KEY (idRole)
);



CREATE TABLE hashtag(
	idHashtag      INT NOT NULL ,
	texte          VARCHAR (25) NOT NULL UNIQUE,
	idConstructeur INT  NOT NULL ,
	CONSTRAINT prk_constraint_hashtag PRIMARY KEY (idHashtag)
);



CREATE TABLE commentaire(
	idCommentaire   INT NOT NULL , 
	datePublication TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	contenu         VARCHAR (250)  ,
	idUtilisateur   INT  NOT NULL ,
	idVoiture       INT  NOT NULL ,
	idConstructeur  INT  ,
	CONSTRAINT prk_constraint_commentaire PRIMARY KEY (idCommentaire)
);


CREATE TABLE photo(
	idPhoto   INT NOT NULL ,
	photo     VARCHAR (255) NOT NULL ,
	idVoiture INT  NOT NULL ,
	CONSTRAINT prk_constraint_photo PRIMARY KEY (idPhoto)
);



CREATE TABLE suivremodele(
	idUtilisateur INT  NOT NULL ,
	idVoiture     INT  NOT NULL ,
	CONSTRAINT prk_constraint_suivremodele PRIMARY KEY (idUtilisateur,idVoiture)
);



CREATE TABLE suivreconstructeur(
	idUtilisateur  INT  NOT NULL ,
	idConstructeur INT  NOT NULL ,
	CONSTRAINT prk_constraint_suivreconstructeur PRIMARY KEY (idUtilisateur,idConstructeur)
);


CREATE TABLE estliee(
	idVoiture INT  NOT NULL ,
	idHashtag INT  NOT NULL ,
	CONSTRAINT prk_constraint_estliee PRIMARY KEY (idVoiture,idHashtag)
);



ALTER TABLE utilisateur CHANGE idUtilisateur idUtilisateur INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE constructeur CHANGE idConstructeur idConstructeur INT(11) NOT NULL AUTO_INCREMENT;  
ALTER TABLE commentaire CHANGE idCommentaire idCommentaire INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE voiture CHANGE idVoiture idVoiture INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE photo CHANGE idPhoto idPhoto INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE hashtag CHANGE idHashtag idHashtag INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE utilisateur ADD CONSTRAINT FK_utilisateur_idRole FOREIGN KEY (idRole) REFERENCES role(idRole);
ALTER TABLE voiture ADD CONSTRAINT FK_voiture_idConstructeur FOREIGN KEY (idConstructeur) REFERENCES constructeur(idConstructeur);
ALTER TABLE constructeur ADD CONSTRAINT FK_constructeur_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(idUtilisateur);
ALTER TABLE hashtag ADD CONSTRAINT FK_hashtag_idConstructeur FOREIGN KEY (idConstructeur) REFERENCES constructeur(idConstructeur);
ALTER TABLE commentaire ADD CONSTRAINT FK_commentaire_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(idUtilisateur);
ALTER TABLE commentaire ADD CONSTRAINT FK_commentaire_idVoiture FOREIGN KEY (idVoiture) REFERENCES voiture(idVoiture);
ALTER TABLE commentaire ADD CONSTRAINT FK_commentaire_idConstructeur FOREIGN KEY (idConstructeur) REFERENCES constructeur(idConstructeur);
ALTER TABLE photo ADD CONSTRAINT FK_photo_idVoiture FOREIGN KEY (idVoiture) REFERENCES voiture(idVoiture);
ALTER TABLE suivremodele ADD CONSTRAINT FK_suivremodele_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(idUtilisateur);
ALTER TABLE suivremodele ADD CONSTRAINT FK_suivremodele_idVoiture FOREIGN KEY (idVoiture) REFERENCES voiture(idVoiture);
ALTER TABLE suivreconstructeur ADD CONSTRAINT FK_suivreconstructeur_idUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(idUtilisateur);
ALTER TABLE suivreconstructeur ADD CONSTRAINT FK_suivreconstructeur_idConstructeur FOREIGN KEY (idConstructeur) REFERENCES constructeur(idConstructeur);
ALTER TABLE estliee ADD CONSTRAINT FK_estliee_idVoiture FOREIGN KEY (idVoiture) REFERENCES voiture(idVoiture);
ALTER TABLE estliee ADD CONSTRAINT FK_estliee_idHashtag FOREIGN KEY (idHashtag) REFERENCES hashtag(idHashtag);

ALTER TABLE voiture ADD UNIQUE(nomVoiture);
ALTER TABLE role ADD UNIQUE(idRole);

ALTER TABLE voiture ADD datemodif TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;