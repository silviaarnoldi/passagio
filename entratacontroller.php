<?php
include "connessione.php";
session_start();

$nome = $_POST['nome'] ?? '';
$cognome = $_POST['cognome'] ?? '';
$persona_da_visitare = $_POST['persona_da_visitare'] ?? '';
$qualifica_societa = $_POST['qualifica_societa'] ?? '';
$firma_base64 = $_POST['firma'] ?? '';

if ($nome && $cognome && $persona_da_visitare && $firma_base64) {
    $cartella_firme = "uploads/firme/";
    if (!file_exists($cartella_firme)) {
        mkdir($cartella_firme, 0775, true);
    }

    $firma_base64_clean = str_replace('data:image/png;base64,', '', $firma_base64);
    $firma_base64_clean = str_replace(' ', '+', $firma_base64_clean);
    $data_binaria = base64_decode($firma_base64_clean);

    $nome_file_firma = $cartella_firme . 'firma_' . time() . '_' . uniqid() . '.png';

    if (file_put_contents($nome_file_firma, $data_binaria)) {
        $stmt = $connessione->prepare("INSERT INTO passagio (NOME, COGNOME, PERSONA_DA_VISITARE, MOTIVO, FIRMA_PATH, DATAOGGI, ORAENTRATA) VALUES (?, ?, ?, ?, ?, CURDATE(), NOW())");
        $stmt->bind_param("sssss", $nome, $cognome, $persona_da_visitare, $qualifica_societa, $nome_file_firma);
        if ($stmt->execute()) {
            echo "<head>";
 echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/style.css">
        <img src="img/logo2.png" width="200" height="80">  ';
                echo "</head>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<center>";
                echo "Entrata effetuata";
                echo "<br>";
                echo "<a href='home.html'class='button'>Torna alla home</a>";
                echo "</center>";
        } else {
            echo "<p>Errore salvataggio DB: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Errore salvataggio firma sul server.</p>";
    }
} else {
    echo "<p>Dati mancanti o firma non presente.</p>";
}

$connessione->close();
?>