<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Overzicht</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    require 'dbconnect.php';

    $sql = "SELECT * FROM jouw_tabel_naam";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ProductID</th><th>ProductNaam</th><th>Prijs</th><th>Beschrijving</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ProductID"]. "</td><td>" . $row["ProductNaam"]. "</td><td>" . $row["Prijs"]. "</td><td>" . $row["Beschrijving"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
