DROP DATABASE IF EXISTS ckoi1inge;

CREATE DATABASE ckoi1inge;

USE ckoi1inge;

CREATE TABLE feedbacks(
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    q1 TEXT NOT NULL,
    q2 TEXT NOT NULL,
    q3 INT NOT NULL,
    q4 TEXT,
    q5 INT NOT NULL,
    PRIMARY KEY(id)
);

/** Créé des identifiants ISEN et mdp ISEN pour faire fonctionner le système */