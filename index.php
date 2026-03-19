<?php 
include "db.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hovedside</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="ansatt/"><button>ansatt</button></a>
    <a href="firma/"><button>firma</button></a>


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