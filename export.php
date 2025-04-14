<?php
$tablename = "passagio";
include "connessione.php";
session_start();

// Crea cartella se non esiste
$dir = __DIR__ . "/exports/";
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// Nome file
$filename = "dati_tabella_" . date("Ymd_His") . ".csv";
$filepath = $dir . $filename;

// Scrive su file
$file = fopen($filepath, "w");

// Intestazioni
$result = $connessione->query("SHOW COLUMNS FROM $tablename");
$headers = [];
while ($row = $result->fetch_assoc()) {
    $headers[] = $row['Field'];
}
fwrite($file, implode(' - ', $headers) . "\n");

// Dati
$result = $connessione->query("SELECT * FROM $tablename");
while ($row = $result->fetch_assoc()) {
    fwrite($file, implode(' - ', $row) . "\n");
}

fclose($file);
$connessione->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>File Esportato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .button {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <center>
    <h2>Esportazione completata!</h2>
    <p>Il file CSV è stato salvato correttamente.</p>
    <!-- Bottone per tornare alla home -->
    <p>
        <a href="index.php" class="button">Torna alla Home</a>
    </p>
    </center>
</body>
</html>
