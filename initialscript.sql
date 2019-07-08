CREATE DATABASE AnnuaireToutou;
USE AnnuaireToutou;

CREATE TABLE Maitres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(200),
    telephone VARCHAR(20)
);

CREATE TABLE Chiens(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    age INT,
    race VARCHAR(200),
    id_maitre INT,
    FOREIGN KEY (id_maitre) REFERENCES Maitres(id)
);

CREATE USER "adminToutou"@"%" IDENTIFIED BY "Annu@ireT0ut0u";
GRANT ALL PRIVILEGES ON AnnuaireToutou.* TO "adminToutou"@"%";

--Insérer un maitre
INSERT INTO Maitres (nom, telephone)
VALUES ('Bob', '0798767654');

--Insérer un  chien
INSERT INTO Chiens (nom, age, race, id_maitre)
VALUES ("Donatello", "5", "Huskey", 2);

--Selectionner tout les chiens
SELECT id, nom, race FROM Chiens;

--Selectionner un chien avec les informations de son maitre
SELECT c.id, c.nom, c.age, c.race, m.nom as nomMaitre, m.telephone
FROM Chiens c
INNER JOIN Maitres m
ON c.id_maitre = m.id
WHERE c.id = 14

--Suprimer un chien de la base des données
DELETE FROM Chiens WHERE id = 23

--Mettre à jour les informations d'un chien
UPDATE chiens Set nom = "edmon" , age = 4, race = "chiwawa"
WHERE id = 25