# crm_gr3

<!-- laget av trevor
CREATE DATABASE CRM_GR3;
USE CRM_GR3;

CREATE TABLE kunder (
    kunde_id INT AUTO_INCREMENT PRIMARY KEY,
    fornavn VARCHAR(100) NOT NULL,
    etternavn VARCHAR(100) NOT NULL,
    adresse VARCHAR(150),
    postnummer VARCHAR(10),
    telefon VARCHAR(20) NOT NULL,
    epost VARCHAR(100)NOT NULL,
    fodselsdato DATE
	);
CREATE TABLE ansatt (
    ansatt_id INT AUTO_INCREMENT PRIMARY KEY,
    kunde_id INT NOT NULL,
    fornavn VARCHAR(50) NOT NULL,
    etternavn VARCHAR(50) NOT NULL,
    telefon VARCHAR(20),
    epost VARCHAR(100),
    FOREIGN KEY (kunde_id) REFERENCES kunder(kunde_id)
    ); 
CREATE TABLE kunde_ansatt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kunde_id INT NOT NULL,
    ansatt_id INT NOT NULL,
    FOREIGN KEY (kunde_id) REFERENCES kunder(kunde_id),
    FOREIGN KEY (ansatt_id) REFERENCES ansatt(ansatt_id)
    )
    -->