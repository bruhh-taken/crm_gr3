<?php 
include "../db.php"
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="nav">
    <a href="kunde.php" ><button class="tilbake">tilbake</button></a>
</nav>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $adresse = $_POST['adresse'];
    $postnummer = $_POST['postnummer'];
    $telefon = $_POST['telefon'];
    $epost = $_POST['epost'];
    $fodselsdato = $_POST['fodselsdato'];
    $sql = "INSERT INTO kunder (fornavn, etternavn, adresse, postnummer, telefon, epost, fodselsdato)
        VALUES ('$fornavn', '$etternavn', '$adresse','$postnummer','$telefon','$epost','$fodselsdato')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>elev lagt til</p>";
        } 
        elseif ($conn->error) {
        echo "<p>kunde ikke lagt til. Feil: " . $conn->error . "</p>"; }
}
           
?>
<form method="post">
        <label for="">Fornavn:</label> <br>
        <input type="text" name="fornavn" required class="add" id="fornavn"> <br>
        <label for="">Etternavn:</label> <br>
        <input type="text" name="etternavn" required class="add" id="etternavn"> <br>
        <label for="">adresse:</label> <br>
        <input type="text" name="adresse" required class="add" id="adresse"> <br>
        <label for="">post nummer:</label> <br>
        <input type="text" name="postnummer" required class="add" id="postnummer"> <br>
        <label for="">telefon:</label> <br>
        <input type="text" name="telefon" required class="add" id="telefon"> <br>
        <label for="">epost:</label> <br>
        <input type="text" name="epost" required class="add" id="epost"> <br>
        <label for="">fodselsdato:</label> <br>
        <input type="date" name="fodselsdato" required class="add" id="fodselsdato"> <br>
        <button type="submit" name='InsertFunction' class="add" id="leggtil">Legg til kunde</button> <br>
    </form>
</body>
</html>