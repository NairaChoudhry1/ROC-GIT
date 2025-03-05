<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "Winkel";

$connectie = new mysqli($host, $user, $pass, $database);

if ($connectie->connect_error) {
    die("Verbinding mislukt: " . $connectie->connect_error);
}

echo "Connected to database ($database).";

$connectie->close();
?>
