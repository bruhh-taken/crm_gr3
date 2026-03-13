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
    <a href="ansatt.php" ><button class="tilbake">tilbake</button></a>
</nav>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $telefon = $_POST['telefon'];
    $epost = $_POST['epost'];
    $rolle = $_POST['rolle'];
    $sql = "INSERT INTO ansatt (fornavn, etternavn, telefon, epost, rolle)
        VALUES ('$fornavn', '$etternavn', '$telefon','$epost','$rolle')";
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
        <button type="submit" name='InsertFunction' class="add" id="leggtil">Legg til kunde</button> <br>
    </form>
</body>
</html>