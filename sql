-- firma, ansatt og database
-- laget av Trevor
-- eksempeldata firma og ansatt
-- laget av Trevor med hjelp av chatgpt
-- login
-- Laget av Oliver
-- eksempeldata login
-- laget av Oliver med hjelp av chatgpt
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

INSERT INTO firma (firma, epost, telefon, adresse, postnummer) VALUES
('Tech Solutions AS', 'kontakt@tech.no', '12345678', 'Karl Johans gate 1', '0154'),
('Nordic Bygg AS', 'post@nordicbygg.no', '87654321', 'Storgata 10', '0184'),
('Oslo Design', 'hei@design.no', '11223344', 'Bogstadveien 5', '0355'),
('Green Energy AS', 'info@greenenergy.no', '99887766', 'Drammensveien 100', '0271'),
('Fjord Consulting', 'post@fjord.no', '77665544', 'Vikaveien 7', '1366'),
('Nordic Solutions', 'kontakt@nordicsol.no', '66778899', 'Trondheimsveien 22', '0560'),
('BlueWave IT', 'post@bluewave.no', '55667788', 'Bryggegata 12', '0450'),
('Urban Architects', 'hei@urban.no', '44556677', 'Hausmanns gate 15', '0182'),
('Seaside Marketing', 'kontakt@seaside.no', '33445566', 'Strandgata 3', '0250'),
('Mountain Logistics', 'info@mountain.no', '22334455', 'Fjellveien 20', '0570');
INSERT INTO ansatt (fornavn, etternavn, telefon, epost, rolle, fodselsdato, kunde_id) VALUES
('Ola', 'Nordmann', '90000001', 'ola@tech.no', 'Utvikler', '1990-05-12', 1),
('Kari', 'Hansen', '90000002', 'kari@nordicbygg.no', 'Prosjektleder', '1985-09-23', 2),
('Per', 'Johansen', '90000003', 'per@design.no', 'Designer', '1992-03-15', 3),
('Anne', 'Olsen', '90000004', 'anne@tech.no', 'Support', '1995-07-30', 1),
('Lars', 'Berg', '90000005', 'lars@nordicbygg.no', 'Snekker', '1988-11-02', 2),
('Emma', 'Lie', '90000006', 'emma@greenenergy.no', 'Prosjektleder', '1991-04-17', 4),
('Jonas', 'Moe', '90000007', 'jonas@fjord.no', 'Konsulent', '1987-12-09', 5),
('Sara', 'Nilsen', '90000008', 'sara@nordicsol.no', 'Utvikler', '1993-08-21', 6),
('Magnus', 'Karlsen', '90000009', 'magnus@tech.no', 'Tester', '1994-01-05', 1),
('Ida', 'Haug', '90000010', 'ida@nordicbygg.no', 'Snekker', '1989-06-30', 2),
('Erik', 'Lund', '90000011', 'erik@bluewave.no', 'Utvikler', '1990-12-12', 7),
('Maja', 'Solberg', '90000012', 'maja@urban.no', 'Arkitekt', '1992-02-28', 8),
('Henrik', 'Bakke', '90000013', 'henrik@seaside.no', 'Markedsfører', '1988-08-14', 9),
('Lisa', 'Fredriksen', '90000014', 'lisa@mountain.no', 'Logistikk', '1991-11-20', 10),
('Thomas', 'Andreassen', '90000015', 'thomas@tech.no', 'Utvikler', '1993-04-05', 1),
('Nora', 'Kristiansen', '90000016', 'nora@nordicbygg.no', 'Snekker', '1986-07-17', 2),
('Sebastian', 'Haugen', '90000017', 'sebastian@fjord.no', 'Konsulent', '1990-03-11', 5),
('Amalie', 'Bjørn', '90000018', 'amalie@nordicsol.no', 'Utvikler', '1994-09-09', 6),
('David', 'Hansen', '90000019', 'david@greenenergy.no', 'Support', '1989-01-22', 4),
('kebab', 'makkarr', 'nei', 'bare brev', 'lage kebab', '2026-05-02', 8);

CREATE TABLE brukere (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brukernavn VARCHAR(100) NOT NULL UNIQUE,
    passord VARCHAR(255) NOT NULL
);

INSERT INTO brukere (brukernavn, passord) VALUES
('oliver', 'oliver1'),
('trevor', 'trevor1'),
('aiden', 'aiden1');


