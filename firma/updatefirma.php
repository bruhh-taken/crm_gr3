<!-- laget av aiden -->
<?php
include "../include/db.php";
?>
 
<?php
$kunde_id = intval($_GET['kunde_id']);
 
// Hent eksisterende firmadata
$sql = "SELECT * FROM firma WHERE kunde_id=$kunde_id";
$result = $conn->query($sql);
 
if ($result->num_rows != 1) {
    echo "Fant ikke firma.";
    exit();
}
 
$firma = $result->fetch_assoc();
?>
 
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firmanavn = $_POST['firma'];
    $adresse = $_POST['adresse'];
    $postnummer = $_POST['postnummer'];
    $telefon = $_POST['telefon'];
    $epost = $_POST['epost'];
 
    $sql = "UPDATE firma SET
        firma='$firmanavn',
        adresse='$adresse',
        postnummer='$postnummer',
        telefon='$telefon',
        epost='$epost'
        WHERE kunde_id=$kunde_id";
 
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Feil under oppdatering: " . $conn->error . "</p>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppdater firma</title>
    <link rel="stylesheet" href="../include/styl.css">
</head>
<body class="container">
    <nav class="nav">
        <a href="."><button class="tilbake">tilbake</button></a>
    </nav>
 
    <form method="POST" action="">
        <label for="firma">Firma:</label><br>
        <input type="text" name="firma" required value="<?php echo $firma['firma']; ?>"><br><br>
 
        <label for="adresse">Adresse:</label><br>
        <input type="text" name="adresse" required value="<?php echo $firma['adresse']; ?>"><br><br>
 
        <label for="postnummer">Postnummer:</label><br>
        <input type="text" name="postnummer" required value="<?php echo $firma['postnummer']; ?>"><br><br>
 
        <label for="telefon">Telefon:</label><br>
        <input type="text" name="telefon" required value="<?php echo $firma['telefon']; ?>"><br><br>
 
        <label for="epost">E-post:</label><br>
        <input type="text" name="epost" required value="<?php echo $firma['epost']; ?>"><br><br>
 
        <button type="submit">Lagre endringer</button>
    </form>
</body>
</html>