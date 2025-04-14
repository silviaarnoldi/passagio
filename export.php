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
fputcsv($file, $headers);

// Dati
$result = $connessione->query("SELECT * FROM $tablename");
while ($row = $result->fetch_assoc()) {
    fputcsv($file, $row);
}

fclose($file);
$connessione->close();

// Reindirizza al file per download
header("Location: exports/" . $filename);
exit;
?>