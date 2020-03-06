----------------------------------la table auteur-------------------------------

CREATE TABLE auteur (
	id int (255) NOT NULL AUTO_INCREMENT,
	mot_passe varchar (20) NOT NULL, 
	nom char (50) NOT NULL,
	prenom char (50) NOT NULL,
	email varchar (100) NOT NULL, 
	civilite char (5),
	prix char (100),
	date_de_naissance date,
	nationalite char(30),
	PRIMARY KEY (id)
	);
	
---------------------------------------------------------------------------------	
---------------------------------la table conference-----------------------------

CREATE TABLE conference (
	id_conf int (255) NOT NULL AUTO_INCREMENT,
	id_auteur int (255) NOT NULL,
	titre_conf char (70) NOT NULL , 
	nom_auteur char (70) NOT NULL,
	nom_coauteurs char (200),
	theme char(30),
	type_conf char (30),
	date_conf date,
	lieu char(30),
	langue char(30), 
	PRIMARY KEY(id_conf),
	FOREIGN KEY (id_auteur) references auteur (id),
	FOREIGN KEY(nom_auteur) references auteur(nom)
	);
	
----------------------------------------------------------------------------------
---------------------------------la table article---------------------------------

	CREATE TABLE article (  
		id_article int (255) NOT NULL AUTO_INCREMENT,
		id_auteur int (255) NOT NULL, 
		titre_article char (70) NOT NULL,
		nom_auteur char (70) NOT NULL,
		nom_coauteurs char (70),
		type_article char (30),
		langue char(30),
		PRIMARY KEY(id_article),
		FOREIGN KEY(id_auteur) references auteur (id),
		FOREIGN KEY(nom_auteur) references auteur(nom)
		);
	
----------------------------------------------------------------------------------	
---------------------------------la table revue-----------------------------------

CREATE TABLE revue (
	id_revue int (255) NOT NULL AUTO_INCREMENT,
	id_auteur int (255) NOT NULL,
	titre_revue char (70) NOT NULL,
	nom_coauteurs char (200),
	type_revue char (30),
	langue char(30),
	date_de_parution date,
	numero_revue int(255),
	PRIMARY KEY(id_revue),
	FOREIGN KEY(id_auteur) references auteur (id)
	);
	
----------------------------------------------------------------------------------
----------------------------------la table livre----------------------------------	
CREATE TABLE livre (
	id_livre int (255) NOT NULL AUTO_INCREMENT,
	id_auteur int (255) NOT NULL,
	titre_livre char (70) NOT NULL,
	nom_auteur char (70) NOT NULL,
	nom_coauteurs char (200),
	edition char(50),
	date_pub date,
	type_livre char (30),
	langue char(30),
	nombre_chapitres int(255),
	PRIMARY KEY(id_livre),
	FOREIGN KEY(id_auteur) references auteur (id),
	FOREIGN KEY(nom_auteur) references auteur (nom)
	);
	
----------------------------------------------------------------------------------
--------------- table pour la relation redige"auteur","article" ------------------
CREATE TABLE redige (
	id_auteur int (127) NOT NULL,
	id_article int (127) NOT NULL,
	PRIMARY KEY (id_auteur, id_article),
	FOREIGN KEY (id_auteur) references auteur (id),
	FOREIGN KEY (id_article) references article (id_article)
	);
	
-----------------------------------------------------------------------------------
-------------- table pour la relation expose "auteur","conférence"-----------------

CREATE TABLE expose (
	id_auteur int (127) NOT NULL,
	id_conf int (127) NOT NULL,
	PRIMARY KEY (id_auteur, id_conf),
	FOREIGN KEY (id_auteur) references auteur (id),
	FOREIGN KEY (id_conf) references conference (id_conf)
	);
	
-----------------------------------------------------------------------------------
---------------- table pour la relation ecrit "auteur","livre"---------------------

CREATE TABLE ecrit (
	id_auteur int (128) NOT NULL,
	id_livre int (128) NOT NULL,
	PRIMARY KEY (id_auteur, id_livre), 
	FOREIGN KEY (id_auteur) references auteur (id),	
    FOREIGN KEY (id_livre) references livre (id_livre)
	);
	
-----------------------------------------------------------------------------------
----------------- table pour la relation appartient "article","revue"--------------

CREATE TABLE appartient_revue (
	id_article int (127) NOT NULL,
	id_revue int (127) NOT NULL,
	PRIMARY KEY (id_article, id_revue),
	FOREIGN KEY (id_article) references article (id_article),
	FOREIGN KEY (id_revue) references revue (id_revue)
	);
	
------------------------------------------------------------------------------------
---------------- table pour la relation appartient "article","livre"----------------

CREATE TABLE appartient_livre (
 	id_article int (127) NOT NULL,
	id_livre int (255) NOT NULL,
	PRIMARY KEY (id_article, id_livre),
	FOREIGN KEY (id_article) references article (id_article),
	FOREIGN KEY (id_livre) references livre (id_livre)
	);
	
