<!-- laget av trevor -->
<?php 
include "include/db.php"
?>

<?php
session_start();
if (!isset($_SESSION["bruker"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hovedside</title>
    <link rel="stylesheet" href="include/style.css">
</head>
<body class="container">
    <a href="ansatt/"><button class="knappindex">ansatt</button></a>
    <a href="firma/"><button class="knappindex">firma</button></a><br>
    <a href="login.php?logout=1"><button class="knappindex">Logg ut</button></a><br>
    <a href="registrer.php"><button class="knappindex">Legg til ny bruker</button></a>
</body>
</html>