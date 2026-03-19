laget av Trevor
CREATE DATABASE crm_gr3;
USE crm_gr3;
 
CREATE TABLE firma (
    kunde_id INT AUTO_INCREMENT PRIMARY KEY,
    firma VARCHAR(255),
    epost VARCHAR(255),
    telefon VARCHAR(50),
    adresse VARCHAR(255) NULL,
    postnummer VARCHAR(20) NULL
);
 
CREATE TABLE ansatt (
    ansatt_id INT AUTO_INCREMENT PRIMARY KEY,
    fornavn VARCHAR(255),
    etternavn VARCHAR(255),
    telefon VARCHAR(50) NULL,
    epost VARCHAR(255) NULL,
    rolle VARCHAR(100) NULL,
    fodselsdato DATE NULL,
    kunde_id INT,
    FOREIGN KEY (kunde_id) REFERENCES firma(kunde_id)
);


Laget av Oliver
CREATE TABLE brukere (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brukernavn VARCHAR(100) NOT NULL UNIQUE,
    passord VARCHAR(255) NOT NULL
);
