<?php 
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kunder</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <h1>Kundedatabase</h1>
    <h2>Liste over kunder</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Navn på kunde</th>
            <th>Navn på kontaktperson</th>
            <th>Mer info</th>
            <th>Slett</th>
            <th>Rediger</th>
        </tr>
        <?php
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['kunde'] . "</td>";
                echo "<td>" . $row['kontaktperson'] . "</td>";
                echo "<td><a href='kundeinfo.php?id=" . $row['id'] . "'>Mer info</a></td>";
                echo "<td><a href='DeleteKunder.php?id=" . $row['id'] . "'>Slett</a></td>";
                echo "<td><a href='update.php?id=" . $row['id'] . "'>Oppdater</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <a href="createkunde.php">Ny kunde</a>
</body>
</html>