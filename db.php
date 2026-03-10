<?php
$host = "localhost";
$user = "root"; // Brukernavnet til databasen
$password = ""; // Ditt passord
$db = "crm_gr3";  // Navnet på databasen

// Oppretter en ny kobling til MySQL-databasen
$conn = new mysqli($host, $user, $password, $db);

// Sjekker om koblingen lyktes
if ($conn->connect_error) {
    die("Kunne ikke koble til databasen: " . $conn->connect_error);
}
?>