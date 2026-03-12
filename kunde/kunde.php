<?php 
include "../db.php";
$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$sql = "SELECT * FROM kunder 
        WHERE fornavn LIKE '%$search%' 
        OR etternavn LIKE '%$search%' 
        OR telefon LIKE '%$search%'";

$result = $conn->query($sql);
?> 
<?php $sql = "SELECT * FROM kunder";

// Utfører SQL-spørringen på databasen og lagrer resultatet i 
// variabelen $result
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
    <input type="text" name="search" placeholder="Søk etter kunde">
    <button type="submit">Søk</button>
</form>
<table border = "1">
        <tr>
            <th>id</th>
            <th>fornavn</th>
            <th>etternavn</th>
            <th>adresse</th>
            <th>post nummer</th>
            <th>telefon</th>
            <th>epost</th>
            <th>fødselsdato</th>
            <th>handlinger</th>
        </tr>
        <?php
        
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['kunde_id'] . "</td>";
            echo "<td>" . $row['fornavn'] . "</td>";
            echo "<td>" . $row['etternavn'] . "</td>";
            echo "<td>" . $row['adresse'] . "</td>";
            echo "<td>" . $row['postnummer'] . "</td>";
            echo "<td>" . $row['telefon'] . "</td>";
            echo "<td>" . $row['epost'] . "</td>";
            echo "<td>" . $row['fodelsdato'] . "</td>";
            echo "<td> <a href='deletekunde.php?kunde_id=" . $row['kunde_id'] ."'>slett</a> </td>";
            echo "<td> <a href='updatekunde.php?kunde_id=" . $row['kunde_id'] ."'>rediger</a> </td>";
            echo "</tr>";
        }
        
        ?>
        <a href="createkunde.php"><button>legg til ny kunde</button></a>
    <button></button>
</body>
</html>
