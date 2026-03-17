<!-- laget av aiden -->
<?php
include '../db.php';

$kunde = null;
$id = null;

// Hvis kunde_id kommer fra URL eller skjema
if (isset($_GET['kunde_id'])) {
    $id = intval($_GET['kunde_id']);
} elseif (isset($_POST['kunde_id']) && !isset($_POST['lagre'])) {
    $id = intval($_POST['kunde_id']);
}

// Hent kunde hvis ID finnes
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM kunder WHERE kunde_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $kunde = $result->fetch_assoc();
    } else {
        echo "<p>Fant ikke kunden.</p>";
    }

    $stmt->close();
}

// Lagre oppdatering
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lagre']) && isset($_POST['kunde_id'])) {
    $id = intval($_POST['kunde_id']);

    $stmt = $conn->prepare("SELECT * FROM kunder WHERE kunde_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $kunde = $result->fetch_assoc();
        $stmt->close();

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
            $sql = "UPDATE kunder SET " . implode(", ", $fields) . " WHERE kunde_id = ?";
            $types = str_repeat('s', count($values)) . 'i';
            $values[] = $id;

            $stmt = $conn->prepare($sql);

            $bind_names = [];
            $bind_names[] = $types;
            for ($i = 0; $i < count($values); $i++) {
                $bind_names[] = &$values[$i];
            }

            call_user_func_array([$stmt, 'bind_param'], $bind_names);

            if ($stmt->execute()) {
                echo "<p>Kunden ble oppdatert.</p>";
            } else {
                echo "<p>Feil under oppdatering: " . htmlspecialchars($stmt->error) . "</p>";
            }

            $stmt->close();

            // Hent oppdatert data på nytt
            $stmt = $conn->prepare("SELECT * FROM kunder WHERE kunde_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                $kunde = $result->fetch_assoc();
            }
            $stmt->close();
        }
    } else {
        echo "<p>Fant ikke kunden.</p>";
        $stmt->close();
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

    <?php if (!$kunde): ?>
        <form method="POST" action="">
            <label for="kunde_id">Skriv inn kunde-ID:</label><br>
            <input type="number" name="kunde_id" required><br><br>
            <button type="submit">Hent kunde</button>
        </form>
    <?php else: ?>
        <form method="POST" action="">
            <input type="hidden" name="kunde_id" value="<?php echo htmlspecialchars($kunde['kunde_id']); ?>">

            <?php
            foreach ($kunde as $col => $val) {
                if ($col === 'kunde_id') continue;

                $label = ucfirst(str_replace('_', ' ', $col));
                echo "<label>" . htmlspecialchars($label) . ":</label><br>";
                echo "<input type='text' name='" . htmlspecialchars($col) . "' required value='" . htmlspecialchars($val) . "'><br><br>";
            }
            ?>

            <button type="submit" name="lagre">Lagre endringer</button>
        </form>
    <?php endif; ?>

    <br>
    <a href="index.php">Tilbake til oversikt</a>
</body>
</html>