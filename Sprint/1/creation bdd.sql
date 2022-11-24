/*  Requète de créaation de bdd */
CREATE DATABASE bdd_gedimagination DEFAULT CHARSET=utf8;
USE bdd_gedimagination;

CREATE TABLE Utilisateur(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email varchar(150) UNIQUE,
    mdp varchar(120),
    nom varchar(40),
    prenom varchar(40),
    statut varchar(1)
);

CREATE TABLE Realisation(
    id INT PRIMARY KEY AUTO_INCREMENT,
    photo varchar(500),
    titre varchar(100),
    descriptif varchar(150),
    dateDebut DATE,
    dateFin DATE,
    dateParticipation DATE,
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id)
);

CREATE TABLE Concours(
    participationDebut DATE,
    participationFin DATE
);

/*  Requète d'insert */ 
INSERT INTO Utilisateur (email, mdp, nom, prenom, statut) VALUES ('tanguy@gmail.com', 'tanguy1234', 'AVET', 'Tanguy', 'G');
INSERT INTO Utilisateur (email, mdp, nom, prenom, statut) VALUES ('efeliott@gmail.com', 'eliott1234', 'FERTILLE', 'Eliott', 'P');
INSERT INTO Utilisateur (email, mdp, nom, prenom, statut) VALUES ('yfyannis@gmail.com', 'yannis1234', 'FOUREL', 'Yannis', 'P');
INSERT INTO Utilisateur (email, mdp, nom, prenom, statut) VALUES ('alayrton@gmail.com', 'ayrton1234', 'LORIAU', 'Ayrton', 'P');
INSERT INTO Utilisateur (email, mdp, nom, prenom, statut) VALUES ('leoberger@gmail.com', 'leo1234', 'BERGER', 'Leo', 'P');

INSERT INTO Realisation (photo, titre, descriptif, dateDebut, dateFin, dateParticipation) VALUES ('url photo', 'Salon de jardin', 'Beau jardin ...', '2019-05-14', '2019-06-02', '2022-12-15');
INSERT INTO Realisation (photo, titre, descriptif, dateDebut, dateFin, dateParticipation) VALUES ('url photo', 'Cuisine', 'Cuisine moderne ...', '2021-02-25', '2021-04-10', '2022-12-13');
INSERT INTO Realisation (photo, titre, descriptif, dateDebut, dateFin, dateParticipation) VALUES ('url photo', 'Salle de bain', 'Salle de bain avec pierre ...', '2022-01-10', '2022-01-22', '2022-12-21');
INSERT INTO Realisation (photo, titre, descriptif, dateDebut, dateFin, dateParticipation) VALUES ('url photo', 'Terrasse', 'Terrasse avec fausse pelouse ...', '2018-07-15', '2018-08-26', '2022-12-11');
INSERT INTO Realisation (photo, titre, descriptif, dateDebut, dateFin, dateParticipation) VALUES ('url photo', 'Salon', 'Salon avec parquet claire ...', '2021-01-14', '2021-02-02', '2022-12-09');

INSERT INTO Concours (participationDebut, participationFin) VALUES ('2022-12-01', '2022-12-31');