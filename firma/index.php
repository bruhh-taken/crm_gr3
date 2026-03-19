<!-- laget av trevor -->
<?php 
include "../db.php";
?>
<?php
$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
$sql = "SELECT * FROM firma ORDER BY firma ASC";

// Utfører SQL-spørringen på databasen og lagrer resultatet i 
// variabelen $result
$result = $conn->query($sql);
$sql = "SELECT * FROM firma 
        WHERE firma LIKE '%$search%' 
        OR epost LIKE '%$search%' 
        OR adresse LIKE '%$search%' 
        ";

$result = $conn->query($sql);
?> 
<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>firma</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href=".."><button>tilbake</button></a>
    <form method="GET">
    <input type="text" name="search" placeholder="Søk etter Firma">
    <button type="submit">Søk</button>
</form>
<table border = "1">
        <tr>
            <th>ID</th>
            <th>Firma</th>
            <th>Adresse</th>
            <th>Post nummer</th>
            <th>Telefon</th>
            <th>E-post</th>
            <th>handlinger</th>
        </tr>
        <?php
        
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['kunde_id'] . "</td>";
            echo "<td>" . $row['firma'] . "</td>";
            echo "<td>" . $row['adresse'] . "</td>";
            echo "<td>" . $row['postnummer'] . "</td>";
            echo "<td>" . $row['telefon'] . "</td>";
            echo "<td>" . $row['epost'] . "</td>";
            echo "<td> <a href='deletefirma.php?kunde_id=" . $row['kunde_id'] ."'>slett</a> </td>";
            echo "<td> <a href='updatefirma.php?kunde_id=" . $row['kunde_id'] ."'>rediger</a> </td>";
            echo "</tr>";
        }
        
        ?>
        </table>
        <a href="createfirma.php"><button>legg til nytt firma</button></a>
</body>
</html>
