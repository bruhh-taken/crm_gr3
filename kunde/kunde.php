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
    <!-- <link rel="stylesheet" href="style.css"> -->
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
            <th>klasse</th>
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
            echo "<td>" . $row['fødelsdato'] . "</td>";
            echo "<td> <a href='deletekunde.php?kunde_id=" . $row['kunde_id'] ."'>slett</a> </td>";
            echo "<td> <a href='updatekunde.php?kunde_id=" . $row['kunde_id'] ."'>rediger</a> </td>";
            echo "</tr>";
        }
        
        ?>
        
<style>
body {
    margin-top: 2%;
    margin-left: 20%;
    margin-right: 20%;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

input[type="text"] {
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: 1px solid #333333;
}

button {
    padding: 8px;
    margin-top: 8px;
    margin-left: 4px;
    margin-bottom: 10px;
    background-color: rgb(214, 214, 214);
    color: rgb(22, 22, 22);
    font-weight: bold;
    border: solid black 1px;
    cursor: pointer;
}

</style>

</body>
</html>
