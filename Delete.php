<?php
    include "db.php";
// Hvis elev-id er sendt
    if (isset($_GET['id'])) { 
        $id = (int)$_GET['id'];
        // Hent kjæledyrets info

        $sql = "SELECT * FROM kjaeledyr WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            echo "<p>Fant ikke kjæledyret.</p>";
            echo "<a href='index.php'>Tilbake</a>";
            exit();
        }
        $kjaeledyr = $result->fetch_assoc();
        } 
        else {
            echo "Ingen kjæledyr er valgt.";
        }
?>

<!DOCTYPE html>
<html><head><title>Bekreft sletting</title></head>
<body>
    <h2>Er du sikker på at du vil slette dette kjæledyret?</h2>
    <p>ID: <?php echo $kjaeledyr['id']; ?></p>
    <p>Navn på kjæledyr: <?php echo $kjaeledyr['kjaeledyr']; ?></p>
    <p>Navn på eier: <?php echo $kjaeledyr['eier']; ?></p>
    <form method="post">
        <button type="submit" name="bekreft">Ja, slett</button>
        <button type="submit" name="avbryt">Avbryt</button>
    </form>
</body>
</html>

<?php
// Hvis bruker har trykket på"Ja, slett"
    if (isset($_POST['bekreft'])) {
            $sql = "DELETE FROM kjaeledyr WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
            echo "<p>Kjæledyr slettet!</p>";
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
    $sql = "SELECT * FROM kjaeledyr WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<p>Fant ikke kjæledyret.</p>";
        echo "<a href='index.php'>Tilbake</a>";
        exit();
    }

    $kjaeledyr = $result->fetch_assoc();
} else {
    echo "Ingen kjæledyr er valgt.";
    exit();
}
?>

<style>
        html{
    margin-right: 5%;
    margin-left: 5%;
    margin-top: 2%;
}

table {
    border-collapse: collapse;
    width: 50%;
}

th, td {
    padding: 8px 12px;
    text-align: left;
}

th {
    background-color: rgb(202, 202, 202) ;
}

tr:hover {
    background-color: #e6e6e6ff;
}

a {
    color: cadetblue;
    font-weight: bold;
    font-size: 24px;
    padding: 10px;
}
        </style>

