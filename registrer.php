<!-- laget av Oliver -->
 
<?php
session_start();
$feil = "";
$suksess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "include/db.php";

    $brukernavn = trim($_POST["brukernavn"]);
    $passord = $_POST["passord"];

    $stmt = $conn->prepare("SELECT id FROM brukere WHERE brukernavn = ?");
    $stmt->bind_param("s", $brukernavn);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $feil = "Brukernavn er allerede tatt.";
    } else {
        $stmt2 = $conn->prepare("INSERT INTO brukere (brukernavn, passord) VALUES (?, ?)");
        $stmt2->bind_param("ss", $brukernavn, $passord);
        $stmt2->execute();
        $suksess = "Bruker opprettet! <a href='login.php'>Logg inn her</a>.";
    }
}
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Registrer bruker</title>
    <link rel="stylesheet" href="include/login.css">
</head>
<body>
    <h2>Registrer bruker</h2>

    <?php if ($feil): ?>
        <p style="color: red;"><?= htmlspecialchars($feil) ?></p>
    <?php endif; ?>
    <?php if ($suksess): ?>
        <p style="color: green;"><?= $suksess ?></p>
    <?php endif; ?>

    <form method="POST" action="registrer.php">
        <label>Brukernavn:</label><br>
        <input type="text" name="brukernavn" required><br><br>

        <label>Passord:</label><br>
        <input type="password" name="passord" required><br><br>

        <button type="submit">Registrer</button>
    </form>

    <br>
    <a href="index.php">Tilbake</a>
</body>
</html>