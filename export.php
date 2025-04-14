<?php
session_start();
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=dati_tabella_" . date("Ymd") . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

$tablename = "passagio";
include "connessione.php";

// Crea l’HTML come tabella Excel
echo '<table border="1">';

// Intestazioni
$result = $connessione->query("SHOW COLUMNS FROM $tablename");
echo "<tr>";
while ($row = $result->fetch_assoc()) {
    echo "<th>" . htmlspecialchars($row['Field']) . "</th>";
}
echo "</tr>";

// Dati
$result = $connessione->query("SELECT * FROM $tablename");
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

$connessione->close();
exit; // Ferma lo script qui per evitare che venga visualizzato altro HTML
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>File Esportato</title>
    <link rel="stylesheet" href="CSS/style.css">
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
