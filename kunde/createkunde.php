<?php 
include "../db.php"
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


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klasse = $_POST['klasse'];
    $sql = "INSERT INTO elever (fornavn, etternavn, klasse)
        VALUES ('$fornavn', '$etternavn', '$klasse')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>elev lagt til</p>";
        } 
        elseif ($conn->error) {
        echo "<p>kunde ikke lagt til. Feil: " . $conn->error . "</p>"; }
}
           
?>
</body>
</html>