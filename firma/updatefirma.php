<?php
include '../db.php'; // juster sti hvis nødvendig
 
// Sjekk at id er satt
 
if (!isset($_GET['kunde_id'])) {
    header("Location: index.php");
    exit();
}
$id = intval($_GET['kunde_id']);
 
// Hent eksisterende kunde (prepared statement)
$stmt = $conn->prepare("SELECT * FROM kunde WHERE kunde_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows !== 1) {
    echo "<p>Fant ikke kunden.</p>";
    exit();
}
$kunde = $result->fetch_assoc();
$stmt->close();
 
// Oppdater kunde hvis skjemaet er sendt inn
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Bygg dynamisk UPDATE basert på POST-feltene som matcher kolonnene
    $fields = [];
    $values = [];
    foreach ($kunde as $col => $val) {
        if ($col === 'kunde_id') continue;
        if (array_key_exists($col, $_POST)) {
            $fields[] = "$col = ?";
            $values[] = $_POST[$col];
        }
    }
 
    if (count($fields) > 0) {
        $sql = "UPDATE kunde SET " . implode(", ", $fields) . " WHERE kunde_id = ?";
        $types = str_repeat('s', count($values)) . 'i';
        $values[] = $id;
 
        $stmt = $conn->prepare($sql);
        // bind_param krever referanser
        $bind_names[] = $types;
        for ($i = 0; $i < count($values); $i++) {
            $bind_names[] = &$values[$i];
        }
        call_user_func_array([$stmt, 'bind_param'], $bind_names);
 
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "<p>Feil under oppdatering: " . htmlspecialchars($stmt->error) . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Ingen felter å oppdatere.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rediger kunde</title>
</head>
<body>
    <h1>Rediger kunde</h1>
    <form method="POST" action="">
        <?php
        // Generer input-felt dynamisk for alle kolonner unntatt id
        foreach ($kunde as $col => $val) {
            if ($col === 'id') continue;
            // Lag et menneskevennlig label
            $label = ucfirst(str_replace('_', ' ', $col));
            echo "<label for=\"" . htmlspecialchars($col) . "\">" . htmlspecialchars($label) . ":</label><br>";
            echo "<input type=\"text\" name=\"" . htmlspecialchars($col) . "\" required value=\"" . htmlspecialchars($val) . "\"><br><br>";
        }
        ?>
        <button type="submit">Lagre endringer</button>
    </form>
    <br>
    <a href="index.php">Tilbake til oversikt</a>
</body>
</html>