<!-- laget av trevor -->
<?php 
include "../include/db.php"
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create firma</title>
    <link rel="stylesheet" href="../include/style.css">
</head>
<body class="container">
<nav class="nav">
    <a href="." ><button class="tilbake">tilbake</button></a>
</nav>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firma = $_POST['firma'];
    $adresse = $_POST['adresse'];
    $postnummer = $_POST['postnummer'];
    $telefon = $_POST['telefon'];
    $epost = $_POST['epost'];
    $sql = "INSERT INTO firma (firma, adresse, postnummer, telefon, epost)
        VALUES ('$firma', '$adresse','$postnummer','$telefon','$epost')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Firma lagt til</p>";
        } 
        elseif ($conn->error) {
        echo "<p>firma ikke lagt til. Feil: " . $conn->error . "</p>"; }
}
?>
<form method="post">
        <label for="">Firma:</label> <br>
        <input type="text" name="firma" required class="add" id="firma"> <br>
        <label for="">Adresse:</label> <br>
        <input type="text" name="adresse" required class="add" id="adresse"> <br>
        <label for="">Post nummer:</label> <br>
        <input type="text" name="postnummer" required class="add" id="postnummer"> <br>
        <label for="">Telefon:</label> <br>
        <input type="text" name="telefon" required class="add" id="telefon"> <br>
        <label for="">Epost:</label> <br>
        <input type="text" name="epost" required class="add" id="epost"> <br>
        
        <button type="submit" name='InsertFunction' class="add" id="leggtil">Legg til firma</button> <br>
    </form>
</body>
</html>