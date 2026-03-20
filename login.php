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

$feil = "";
$suksess = "";
$visning = isset($_GET["registrer"]) ? "registrer" : "login";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    include "db.php";

    $brukernavn = trim($_POST["brukernavn"]);
    $passord = $_POST["passord"];

    $stmt = $conn->prepare("SELECT * FROM brukere WHERE brukernavn = ?");
    $stmt->bind_param("s", $brukernavn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($passord, $row["passord"])) {
            $_SESSION["bruker"] = $brukernavn;
            header("Location: index.php");
            exit();
        }
    }
    $feil = "Feil brukernavn eller passord.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrer"])) {
    include "db.php";
    $visning = "registrer";

    $brukernavn = trim($_POST["brukernavn"]);
    $passord = $_POST["passord"];

    $stmt = $conn->prepare("SELECT id FROM brukere WHERE brukernavn = ?");
    $stmt->bind_param("s", $brukernavn);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $feil = "Brukernavn er allerede tatt.";
    } else {
        $hashet = password_hash($passord, PASSWORD_DEFAULT);
        $stmt2 = $conn->prepare("INSERT INTO brukere (brukernavn, passord) VALUES (?, ?)");
        $stmt2->bind_param("ss", $brukernavn, $hashet);
        $stmt2->execute();
        $suksess = "Bruker opprettet! Logg inn nedenfor.";
        $visning = "login";
    }
}
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $visning === "registrer" ? "Registrer bruker" : "Logg inn" ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if ($visning === "login"): ?>

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

    <br>
    <a href="login.php?registrer=1">Registrer bruker</a>

<?php else: ?>

    <h2>Registrer bruker</h2>

    <?php if ($feil): ?>
        <p style="color: red;"><?= htmlspecialchars($feil) ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Brukernavn:</label><br>
        <input type="text" name="brukernavn" required><br><br>

        <label>Passord:</label><br>
        <input type="password" name="passord" required><br><br>

        <button type="submit" name="registrer">Registrer</button>
    </form>

    <br>
    <a href="login.php">Allerede bruker? Logg inn</a>

<?php endif; ?>

</body>
</html>