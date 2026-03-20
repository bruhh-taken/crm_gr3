<!-- laget av trevor -->
<?php
include "../include/db.php"
?> 
<?php
// Hvis kunde-id er sendt
if (isset($_GET['kunde_id'])) { 
    $id = (int)$_GET['kunde_id'];
    //henter firma info
    $sql = "SELECT * FROM firma WHERE kunde_id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo "<p>Fant ikke firmaet.</p>";
        echo "<a href='kunde.php'>Tilbake</a>";
        exit();
    }
    $elev = $result->fetch_assoc();
?>
<?php
// Hvis bruker har trykket på"Ja, slett"
if (isset($_POST['bekreft'])) {
    $sql = "DELETE FROM firma WHERE kunde_id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<p>firma slettet!</p>";
        echo "<a href='.'>Tilbake til listen</a>";
        exit();
    } else {
        echo "Feil: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>firma sletting</title>
    <link rel="stylesheet" href="../iclude/style.css">
</head>
<body>
<nav class="nav">
    <a href="." ><button class="tilbake">tilbake</button></a>
</nav>
    <h1>Info:</h1>
    <h3>Firma: </h3> <?php echo $elev['firma']; ?>
    <h3>Adresse: </h3><?php echo $elev['adresse']; ?> 
    <h3>Postnummer: </h3><?php echo $elev['postnummer']; ?> 
    <h3>Telefon: </h3><?php echo $elev['telefon']; ?> 
    <h3>E-post: </h3><?php echo $elev['epost']; ?> 
    <br><br>
    <form action="" method="post"><button type="submit" name="bekreft" class="">bekreft sletting</button></form>
    <a href="."><button class="">Avbryt</button></a>

<br><br>

</body>
</html>
<?php
// Ellers hvis ikke kunde-id er sendt"
} else {
    echo "ingen firma er valgt.";
    }
?>