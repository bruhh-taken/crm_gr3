<?php 
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kontaktpersoner</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <h1>Kontaktdatabase</h1>
    <h2>Liste over kontaktpersoner</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Navn på kontaktperson</th>
            <th>Epost</th>
            <th>Mer info</th>
            <th>Slett</th>
            <th>Rediger</th>
        </tr>
        <?php
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['kontaktperson'] . "</td>";
                echo "<td>" . $row['Epost'] . "</td>";
                echo "<td><a href='kontaktinfo.php?id=" . $row['id'] . "'>Mer info</a></td>";
                echo "<td><a href='Deletekontakt.php?id=" . $row['id'] . "'>Slett</a></td>";
                echo "<td><a href='updatekontakt.php?id=" . $row['id'] . "'>Oppdater</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <a href="createkontakt.php">Ny kontaktperson</a>
</body>

</html>
