<!-- laget av trevor -->
<!-- search laget av Aiden -->
<?php 
include "../include/db.php"

$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
$sql = "SELECT * FROM ansatt ORDER BY fornavn ASC";

// Utfører SQL-spørringen på databasen og lagrer resultatet i 
// variabelen $result
$result = $conn->query($sql);
$sql = "SELECT * FROM ansatt 
        WHERE fornavn LIKE '%$search%' 
        OR etternavn LIKE '%$search%' 
        OR rolle LIKE '%$search%' 
        ";


$sql = "SELECT * FROM ansatt ORDER BY fornavn ASC";

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
    <title>ansatte</title>
    <link rel="stylesheet" href="../include/style.css">
</head>
<body>
<a href=".."><button>tilbake</button></a>
<table border = "1">
        <tr>
            <th>id</th>
            <th>fornavn</th>
            <th>etternavn</th>
            <th>rolle</th>
            <th>telefon</th>
            <th>epost</th>
            <th>fødselsdato</th>
            <th>firma nr</th>
            <th>handlinger</th>
        </tr>
        <?php
        
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['ansatt_id'] . "</td>";
            echo "<td>" . $row['fornavn'] . "</td>";
            echo "<td>" . $row['etternavn'] . "</td>";
            echo "<td>" . $row['rolle'] . "</td>";
            echo "<td>" . $row['telefon'] . "</td>";
            echo "<td>" . $row['epost'] . "</td>";
            echo "<td>" . $row['fodselsdato'] . "</td>";
            echo "<td>" . $row['kunde_id'] . "</td>";
            echo "<td> <a href='deleteansatt.php?ansatt_id=" . $row['ansatt_id'] ."'><button>slett</button></a> </td>";
            echo "<td> <a href='updateansatt.php?ansatt_id=" . $row['ansatt_id'] ."'><button>rediger</button></a> </td>";
            echo "</tr>";
        }
        
        ?>
        </table>
        <a href="createansatt.php"><button>legg til ny ansatt</button></a>
</body>
</html>