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
    photo_url varchar(300),
    photo_name varchar(50),
    titre varchar(100),
    descriptif varchar(150),
    date_debut DATE,
    date_fin DATE,
    date_participation DATE,
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_user)
);

CREATE TABLE Concours(
    participation_debut DATE,
    participation_fin DATE
);

/*  Requète d'insert */ 
INSERT INTO Utilisateur (nom, prenom, email, mdp, statut) VALUES ('AVET', 'Tanguy', 'tanguy@gmail.com', 'tanguy1234', 'G');
INSERT INTO Utilisateur (nom, prenom, email, mdp, statut) VALUES ('FERTILLE', 'Eliott', 'efeliott@gmail.com', 'eliott1234', 'P');
INSERT INTO Utilisateur (nom, prenom, email, mdp, statut) VALUES ('FOUREL', 'Yannis', 'yfyannis@gmail.com', 'yannis1234', 'P');
INSERT INTO Utilisateur (nom, prenom, email, mdp, statut) VALUES ('LORIAU', 'Ayrton', 'alayrton@gmail.com', 'ayrton1234', 'P');
INSERT INTO Utilisateur (nom, prenom, email, mdp, statut) VALUES ('BERGER', 'Leo', 'leoberger@gmail.com', 'leo1234', 'P');

INSERT INTO Realisation (photo_url, photo_name, titre, descriptif, date_debut, date_fin, date_participation) VALUES ('url photo', 'nom photo', 'Salon de jardin', 'Beau jardin ...', '2019-05-14', '2019-06-02', '2022-12-15');
INSERT INTO Realisation (photo_url, photo_name, titre, descriptif, date_debut, date_fin, date_participation) VALUES ('url photo', 'nom photo', 'Cuisine', 'Cuisine moderne ...', '2021-02-25', '2021-04-10', '2022-12-13');
INSERT INTO Realisation (photo_url, photo_name, titre, descriptif, date_debut, date_fin, date_participation) VALUES ('url photo', 'nom photo', 'Salle de bain', 'Salle de bain avec pierre ...', '2022-01-10', '2022-01-22', '2022-12-21');
INSERT INTO Realisation (photo_url, photo_name, titre, descriptif, date_debut, date_fin, date_participation) VALUES ('url photo', 'nom photo', 'Terrasse', 'Terrasse avec fausse pelouse ...', '2018-07-15', '2018-08-26', '2022-12-11');
INSERT INTO Realisation (photo_url, photo_name, titre, descriptif, date_debut, date_fin, date_participation) VALUES ('url photo', 'nom photo', 'Salon', 'Salon avec parquet claire ...', '2021-01-14', '2021-02-02', '2022-12-09');

INSERT INTO Concours (participation_debut, participation_fin) VALUES ('2022-12-01', '2022-12-31');