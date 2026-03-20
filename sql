-- laget av Trevor
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
-- eksempeldata
-- laget av Trevor med hjelp av chatgpt
INSERT INTO firma (firma, epost, telefon, adresse, postnummer) VALUES
('Tech Solutions AS', 'kontakt@tech.no', '12345678', 'Karl Johans gate 1', '0154'),
('Nordic Bygg AS', 'post@nordicbygg.no', '87654321', 'Storgata 10', '0184'),
('Oslo Design', 'hei@design.no', '11223344', 'Bogstadveien 5', '0355');
INSERT INTO ansatt (fornavn, etternavn, telefon, epost, rolle, fodselsdato, kunde_id) VALUES
('Ola', 'Nordmann', '90000001', 'ola@tech.no', 'Utvikler', '1990-05-12', 1),
('Kari', 'Hansen', '90000002', 'kari@nordicbygg.no', 'Prosjektleder', '1985-09-23', 2),
('Per', 'Johansen', '90000003', 'per@design.no', 'Designer', '1992-03-15', 3),
('Anne', 'Olsen', '90000004', 'anne@tech.no', 'Support', '1995-07-30', 1),
('Lars', 'Berg', '90000005', 'lars@nordicbygg.no', 'Snekker', '1988-11-02', 2);

-- login
-- Laget av Oliver
CREATE TABLE brukere (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brukernavn VARCHAR(100) NOT NULL UNIQUE,
    passord VARCHAR(255) NOT NULL
);

-- eksempeldata
-- laget av Oliver med hjelp av chatgpt
INSERT INTO brukere (brukernavn, passord) VALUES
('oliver', 'oliver1'),
('trevor', 'trevor1'),
('aiden', 'aiden1');


