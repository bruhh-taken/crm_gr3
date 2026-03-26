<!-- laget av trevor -->
<?php
include "../include/db.php"
?> 
<?php
// Hvis ansatt-id er sendt
if (isset($_GET['ansatt_id'])) { 
    $id = (int)$_GET['ansatt_id'];
    //henter ansattes info
    $sql = "SELECT * FROM ansatt WHERE ansatt_id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo "<p>Fant ikke ansatte.</p>";
        echo "<a href='.'>Tilbake</a>";
        exit();
    }
    $elev = $result->fetch_assoc();
?>
<?php
// Hvis bruker har trykket på"Ja, slett"
if (isset($_POST['bekreft'])) {
    $sql = "DELETE FROM ansatt WHERE ansatt_id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<p>ansatt slettet!</p>";
        echo "<a href='.'>Tilbake til listen</a>";
        exit();
    } else {
        echo "Feil: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>slett ansatt</title>
    <link rel="stylesheet" href="../include/styl.css">
</head>
<body class = "container">
<nav class="nav">
    <a href="." ><button class="tilbake">tilbake</button></a>
</nav>
    <h1>info:</h1>
    <h3>fornavn: </h3> <?php echo $elev['fornavn']; ?>
    <h3>etternavn: </h3>  <?php echo $elev['etternavn']; ?>
    <h3>rolle: </h3><?php echo $elev['rolle']; ?>
    <h3>telefon: </h3><?php echo $elev['telefon']; ?> 
    <h3>epost: </h3><?php echo $elev['epost']; ?> 
    <br><br>
    <form action="" method="post"><button type="submit" name="bekreft" class="">bekreft sletting</button></form>
    <a href="."><button class="">Avbryt</button></a>

<br><br>

</body>
</html>
<?php
// Ellers hvis ikke ansatt-id er sendt"
} else {
    echo "ingen ansatt er valgt.";
    }
?>