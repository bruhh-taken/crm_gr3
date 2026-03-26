<!-- laget av trevor -->
<?php
include "../include/db.php"
?>
<?php
$ansatt_id = intval($_GET['ansatt_id']);
// Hent eksisterende ansattdata. 
$sql = "SELECT * FROM ansatt WHERE ansatt_id=$ansatt_id";
$result = $conn->query($sql);
if ($result->num_rows != 1) {
 echo "Fant ikke ansatte.";
 exit();
}
$ansatt = $result->fetch_assoc();
$firma_result = $conn->query("SELECT kunde_id, firma FROM firma");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Henter inntastede data
 $fornavn =$_POST['fornavn'];
 $etternavn = $_POST['etternavn'];
 $telefon = $_POST['telefon'];
 $epost = $_POST['epost'];
 $rolle = $_POST['rolle'];
 $kunde_id = $_POST['kunde_id'];
 $sql = "UPDATE ansatt SET 
 fornavn='$fornavn', 
 etternavn='$etternavn', 
 telefon='$telefon', 
 epost='$epost', 
 rolle='$rolle', 
 kunde_id='$kunde_id'
 WHERE ansatt_id=$ansatt_id";
 if ($conn->query($sql) === TRUE) {
 header("Location: index.php");
 exit();
 } else {echo "<p>Feil under oppdatering: " . $conn->error ."</p>";}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oppdater ansatt</title>
    <link rel="stylesheet" href="../include/styl.css">
</head>
<body class="container">
    <nav class="nav">
    <a href="." ><button class="tilbake">tilbake</button></a>
    </nav>
    <form method="POST" action="">
 <label for="fornavn">Fornavn:</label><br>
 <input type="text" name="fornavn" required 
 value="<?php echo $ansatt['fornavn']; ?>"><br><br>
 <label for="etternavn">Etternavn:</label><br>
 <input type="text" name="etternavn" required 
 value="<?php echo $ansatt['etternavn']; ?>"><br><br>
 <label for="telefon">telefon:</label><br>
 <input type="text" name="telefon" required 
 value="<?php echo $ansatt['telefon']; ?>"><br><br>
 <label for="epost">epost:</label><br>
 <input type="text" name="epost" required 
 value="<?php echo $ansatt['epost']; ?>"><br><br>
 <label for="rolle">rolle:</label><br>
 <input type="text" name="rolle" required 
 value="<?php echo $ansatt['rolle']; ?>"><br><br>
 <label for="kunde_id">Velg firma:</label><br>
    <select name="kunde_id" required>
        <option value="">-- Velg firma --</option>
        <?php
        while ($row = $firma_result->fetch_assoc()) {
            $selected = ($row['kunde_id'] == $ansatt['kunde_id']) ? "selected" : "";
            echo "<option value='" . $row['kunde_id'] . "' $selected>" . $row['firma'] . "</option>";
        }
        ?>
    </select><br><br>
 <button type="submit">Lagre endringer</button>
</form>


</table>
</body>
</html>