/*  Requète de créaation de bdd */
CREATE DATABASE bdd_gedimagination DEFAULT CHARSET=utf8;
USE bdd_gedimagination;

CREATE TABLE Utilisateur(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nom varchar(40),
    prenom varchar(40),
    email varchar(150) UNIQUE,
    mdp varchar(120),
    statut varchar(1)
);

CREATE TABLE Realisation(
    id_real INT PRIMARY KEY AUTO_INCREMENT,
    name_photo varchar(30),
    url_photo varchar(150),
    titre varchar(100),
    descriptif varchar(150),
    dateDebut DATE,
    dateFin DATE,
    dateParticipation DATE,
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_user)
);

CREATE TABLE Concours(
    participation_debut DATE,
    participation_fin DATE
);

/*  Requète d'insert */ 
INSERT INTO Utilisateur (nom,  prenom, email, mdp, statut) VALUES ('Tanguy', 'AVET', 'tanguy@gmail.com', 'tanguy1234',  'G');
INSERT INTO Utilisateur (nom,  prenom, email, mdp, statut) VALUES ('FERTILLE','Eliott',  'efeliott@gmail.com', 'eliott1234', 'P');
INSERT INTO Utilisateur (nom,  prenom, email, mdp, statut) VALUES ('FOUREL', 'Yannis', 'yfyannis@gmail.com', 'yannis1234', 'P');
INSERT INTO Utilisateur (nom,  prenom, email, mdp, statut) VALUES ('LORIAU', 'Ayrton', 'alayrton@gmail.com', 'ayrton1234', 'P');
INSERT INTO Utilisateur (nom,  prenom, email, mdp, statut) VALUES ('BERGER', 'Leo', 'leoberger@gmail.com', 'leo1234', 'P');

INSERT INTO Realisation (name_photo, url_photo, titre, descriptif, dateDebut, dateFin, dateParticipation, id_utilisateur) VALUES ('nom photo', 'url photo', 'Salon de jardin', 'Beau jardin ...', '2019-05-14', '2019-06-02', '2022-12-15', '1');
INSERT INTO Realisation (name_photo, url_photo, titre, descriptif, dateDebut, dateFin, dateParticipation, id_utilisateur) VALUES ('nom photo', 'url photo', 'Cuisine', 'Cuisine moderne ...', '2021-02-25', '2021-04-10', '2022-12-13', '2');
INSERT INTO Realisation (name_photo, url_photo, titre, descriptif, dateDebut, dateFin, dateParticipation, id_utilisateur) VALUES ('nom photo', 'url photo', 'Salle de bain', 'Salle de bain avec pierre ...', '2022-01-10', '2022-01-22', '2022-12-21', '3');
INSERT INTO Realisation (name_photo, url_photo, titre, descriptif, dateDebut, dateFin, dateParticipation, id_utilisateur) VALUES ('nom photo', 'url photo', 'Terrasse', 'Terrasse avec fausse pelouse ...', '2018-07-15', '2018-08-26', '2022-12-11', '4');
INSERT INTO Realisation (name_photo, url_photo, titre, descriptif, dateDebut, dateFin, dateParticipation, id_utilisateur) VALUES ('nom photo', 'url photo', 'Salon', 'Salon avec parquet claire ...', '2021-01-14', '2021-02-02', '2022-12-09', '5');

INSERT INTO Concours (participation_debut, participation_fin) VALUES ('2022-12-01', '2022-12-31');