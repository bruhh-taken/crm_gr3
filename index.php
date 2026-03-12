<<<<<<< HEAD
<?php 
include "db.php"
?>
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
    FOREIGN KEY (kunde_id) REFERENCES kunder(kunde_id,)
    ); -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="ansatt/ansatt.php"></a>
    <a href="kunde/kunde.php"></a>
</body>
</html>