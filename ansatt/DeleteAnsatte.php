
<?php 
include "../db.php"
?> 
<?php
    if (isset($_GET['id'])) { 
        $id = (int)$_GET['id'];
        // Hent kjæledyrets info

        $sql = "SELECT * FROM ansatte WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            echo "<p>Fant ikke ansatt.</p>";
            echo "<a href='index.php'>Tilbake</a>";
            exit();
        }
        $kunder = $result->fetch_assoc();
        } 
        else {
            echo "Ingen ansatte er valgt.";
        }
?>

<!DOCTYPE html>
<html><head><title>Bekreft sletting</title></head>
<body>
    <h2>Er du sikker på at du vil slette denne ansatten?</h2>
    <p>ID: <?php echo $kunder['id']; ?></p>
    <p>Navn på ansatt: <?php echo $kunder['navn']; ?></p>
    <form method="post">
        <button type="submit" name="bekreft">Ja, slett</button>
        <button type="submit" name="avbryt">Avbryt</button>
    </form>
</body>
</html>

<?php
// Hvis bruker har trykket på"Ja, slett"
    if (isset($_POST['bekreft'])) {
            $sql = "DELETE FROM ansatte WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
            echo "<p>Ansatt slettet!</p>";
            echo "<a href='index.php'>Tilbake til listen</a>";
            exit();
        } else {
            echo "Feil: " . $conn->error;
            if (isset($_POST['avbryt'])) {
                header("Location: index.php");
                exit();
            }
        }
    }


    if (isset($_GET['id'])) { 
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM ansatte WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<p>Fant ikke ansatt.</p>";
        echo "<a href='index.php'>Tilbake</a>";
        exit();
    }

    $kunder = $result->fetch_assoc();
} else {
    echo "Ingen ansatte er valgt.";
    exit();
}
?>
