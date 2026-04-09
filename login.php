<!-- laget av Oliver -->
 
<?php
session_start();

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

if (isset($_SESSION["bruker"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    include "include/db.php";

    $brukernavn = trim($_POST["brukernavn"]);
    $passord = $_POST["passord"];

    $stmt = $conn->prepare("SELECT * FROM brukere WHERE brukernavn = ?");
    $stmt->bind_param("s", $brukernavn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($passord === $row["passord"]) {
        $_SESSION["bruker"] = $brukernavn;
        header("Location: index.php");
        exit();
    }
}
    $feil = "Feil brukernavn eller passord.";
}
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $visning === "registrer" ? "Registrer bruker" : "Logg inn" ?></title>
    <link rel="stylesheet" href="include/login.css">
</head>
<body>

    <h2>Logg inn</h2>

    <?php if ($feil): ?>
        <p style="color: red;"><?= htmlspecialchars($feil) ?></p>
    <?php endif; ?>
    <?php if ($suksess): ?>
        <p style="color: green;"><?= htmlspecialchars($suksess) ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Brukernavn:</label><br>
        <input type="text" name="brukernavn" required><br><br>

        <label>Passord:</label><br>
        <input type="password" name="passord" required><br><br>

        <button type="submit" name="login">Logg inn</button>
    </form>
</body>
</html>