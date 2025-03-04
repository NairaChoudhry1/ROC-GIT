<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productNaam = $_POST['product_naam'];
    $prijsPerStuk = $_POST['prijs_per_stuk'];
    $omschrijving = $_POST['omschrijving'];

    if (!empty($productNaam) && is_numeric($prijsPerStuk) && $prijsPerStuk > 0 && !empty($omschrijving)) {
        $query = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sds", $productNaam, $prijsPerStuk, $omschrijving);

        if ($stmt->execute()) {
            echo "Product succesvol toegevoegd!";
        } else {
            echo "Er is een fout opgetreden: " . $stmt->error;
        }
    } else {
        echo "Controleer de invoer, sommige velden zijn ongeldig.";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg Product Toe</title>
</head>
<body>
    <h1>Voeg een nieuw product toe</h1>
    <form method="post" action="">
        <label for="product_naam">Productnaam:</label>
        <input type="text" id="product_naam" name="product_naam" required><br>

        <label for="prijs_per_stuk">Prijs per stuk:</label>
        <input type="number" id="prijs_per_stuk" name="prijs_per_stuk" step="0.01" required><br>

        <label for="omschrijving">Omschrijving:</label>
        <textarea id="omschrijving" name="omschrijving" required></textarea><br>

        <button type="submit">Voeg product toe</button>
    </form>
</body>
</html>
