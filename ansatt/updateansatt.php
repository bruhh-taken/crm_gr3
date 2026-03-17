<?php
include "../db.php"
?>

<?php
if (!isset($_GET['id'])) {
 header("Location: index.php");
 exit();
}
$id = intval($_GET['id']);
// Hent eksisterende elevdata. 
$sql = "SELECT * FROM elever WHERE id=$id";
$result = $conn->query($sql);
if ($result->num_rows != 1) {
 echo "Fant ikke eleven.";
 exit();
}
$elev = $result->fetch_assoc();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Henter inntastede data
 $fornavn =$_POST['fornavn'];
 $etternavn = $_POST['etternavn'];
 $klasse = $_POST['klasse'];
 $sql = "UPDATE elever SET 
 fornavn='$fornavn', 
 etternavn='$etternavn', 
 klasse='$klasse' 
 WHERE id=$id";
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="nav">
    <a href="." ><button class="tilbake">tilbake</button></a>
    </nav>
    <form method="POST" action="">
 <label for="fornavn">Fornavn:</label><br>
 <input type="text" name="fornavn" required 
 value="<?php echo $elev['fornavn']; ?>"><br><br>
 <label for="etternavn">Etternavn:</label><br>
 <input type="text" name="etternavn" required 
 value="<?php echo $elev['etternavn']; ?>"><br><br>
 <label for="klasse">Klasse:</label><br>
 <input type="text" name="klasse" required 
 value="<?php echo $elev['klasse']; ?>"><br><br>
 <button type="submit">Lagre endringer</button>
</form>




<br><br>
<a href=""><button class="forrige">forrige</button></a>
<a href=""><button class="neste">neste</button></a>
</table>
</body>
</html>