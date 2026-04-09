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
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hovedside</title>
    <link rel="stylesheet" href="include/styl.css">
</head>
<body>
    
    <nav class="loginnav">
    <img src="logo/chatgpt_Image.png" height="80" alt="">
    <a href="login.php?logout=1"><button class="loginknapp">Logg ut</button></a>
    <a href="registrer.php?registrer=1"><button class="loginknapp">Legg til ny bruker</button></a>
    </nav><br>
    <h1 class="overskirftindex">se oversikt over:</h1>
    <section class="containerknapp">
    
    <a href="ansatt/"><button class="knappoversikt">ansatt</button></a>
    <a href="firma/"><button class="knappoversikt">firma</button></a>
    </section>

</body>
</html>