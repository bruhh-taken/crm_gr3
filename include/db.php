<!-- laget av trevor -->
<?php
$host = "localhost:3306";
$user = "db_im24tre1402"; // Brukernavnet til databasen
$password = "7y_PERm7idzqd4%h"; // Ditt passord
$db = "db_im24tre1402";  // Navnet på databasen

// $host = "localhost";
// $user = "root"; // Brukernavnet til databasen
// $password = ""; // Ditt passord
// $db = "crm_gr3";  // Navnet på databasen

// Oppretter en ny kobling til MySQL-databasen
$conn = new mysqli($host, $user, $password, $db);
$conn->set_charset("utf8mb4");

// Sjekker om koblingen lyktes
if ($conn->connect_error) {
    die("Kunne ikke koble til databasen: " . $conn->connect_error);
}
?>