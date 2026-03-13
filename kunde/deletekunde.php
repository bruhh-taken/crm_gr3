<?php
include "../db.php"
?> 
<?php
// Hvis kunde-id er sendt
if (isset($_GET['kunde_id'])) { 
    $id = (int)$_GET['kunde_id'];
    //henter kundens info
    $sql = "SELECT * FROM kunder WHERE kunde_id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo "<p>Fant ikke kunden.</p>";
        echo "<a href='kunde.php'>Tilbake</a>";
        exit();
    }
    $elev = $result->fetch_assoc();
?>
<?php
// Hvis bruker har trykket på"Ja, slett"
if (isset($_POST['bekreft'])) {
    $sql = "DELETE FROM kunder WHERE kunde_id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<p>kunde slettet!</p>";
        echo "<a href='kunde.php'>Tilbake til listen</a>";
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="nav">
    <a href="kunde.php" ><button class="tilbake">tilbake</button></a>
</nav>
    <h1>info:</h1>
    <h3>fornavn: </h3> <?php echo $elev['fornavn']; ?>
    <h3>etternavn: </h3>  <?php echo $elev['etternavn']; ?>
    <h3>adresse: </h3><?php echo $elev['adresse']; ?> 
    <h3>fodselsdato: </h3><?php echo $elev['fodselsdato']; ?>
    <br><br>
    <form action="" method="post"><button type="submit" name="bekreft" class="">bekreft sletting</button></form>
    <a href="kunde.php"><button class="">Avbryt</button></a>

<br><br>

</body>
</html>
<?php
// Ellers hvis ikke kunde-id er sendt"
} else {
    echo "ingen kunde er valgt.";
    }
?>