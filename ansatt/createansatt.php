<!-- laget av trevor -->
<?php 
include "../include/db.php"
?> 
<?php
$firma_result = $conn->query("SELECT kunde_id, firma FROM firma");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create ansatt</title>
    <link rel="stylesheet" href="../include/style.css">
</head>
<body class="container">
<nav class="nav">
    <a href="." ><button class="tilbake">tilbake</button></a>
</nav>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $telefon = $_POST['telefon'];
    $epost = $_POST['epost'];
    $rolle = $_POST['rolle'];
    $kunde_id = $_POST['kunde_id'];
    $fodselsdato = $_POST['fodselsdato'];
    $sql = "INSERT INTO ansatt (fornavn, etternavn, telefon, epost, rolle, kunde_id, fodselsdato)
        VALUES ('$fornavn', '$etternavn', '$telefon','$epost','$rolle', '$kunde_id', '$fodselsdato')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>ansatt lagt til</p>";
        } 
        elseif ($conn->error) {
        echo "<p>ansatt ikke lagt til. Feil: " . $conn->error . "</p>"; }
}
           
?>
<form method="post">
        <label for="">Fornavn:</label> <br>
            <input type="text" name="fornavn" required class="add" id="fornavn"> <br>
        <label for="">Etternavn:</label> <br>
            <input type="text" name="etternavn" required class="add" id="etternavn"> <br>
        <label for="">telefon:</label> <br>
            <input type="text" name="telefon" required class="add" id="telefon"> <br>
        <label for="">e-post:</label> <br>
            <input type="text" name="epost" required class="add" id="epost"> <br>
        <label for="">rolle:</label> <br>
            <input type="text" name="rolle" required class="add" id="rolle"> <br>
        <label for="">Velg firma:</label> <br>
            <select name="kunde_id" required>
            <option value="">-- Velg firma --</option>
                <?php
                while($row = $firma_result->fetch_assoc()) {
                echo "<option value='" . $row['kunde_id'] . "'>" . $row['firma'] . "</option>";
                }
                ?>
            </select> <br>
        <label for="">Fodselsdato:</label> <br>
            <input type="date" name="fodselsdato" required class="add" id="fodselsdato"> <br>
        <button type="submit" name='InsertFunction' class="add" id="leggtil">Legg til ansatt</button> <br>
    </form>
</body>
</html>