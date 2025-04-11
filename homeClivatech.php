<?php
include "connessione.php"; // Assicurati che il file connessione.php sia corretto e contenga le credenziali per il database
session_start();

// Query per selezionare tutte le righe della tabella
$query = "SELECT * FROM passagio";  // Sostituisci 'passagio' con il nome della tua tabella
$risultato = $connessione->query($query);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Tabella Utenti</title>
</head>
<body>
<center>
    <h1>Lista di tutti gli utenti</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Motivo</th>
            <th>Persona da Visitare</th>
            <th>Data Oggi</th>
            <th>Ora Entrata</th>
        </tr>

        <?php
        // Se ci sono risultati, stampali nella tabella
        if ($risultato && $risultato->num_rows > 0) {
            while ($riga = $risultato->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($riga['ID']) . "</td>";
                echo "<td>" . htmlspecialchars($riga['NOME']) . "</td>";
                echo "<td>" . htmlspecialchars($riga['COGNOME']) . "</td>";
                echo "<td>" . htmlspecialchars($riga['MOTIVO']) . "</td>";
                echo "<td>" . htmlspecialchars($riga['PERSONA_DA_VISITARE']) . "</td>";
                echo "<td>" . $riga['DATAOGGI'] . "</td>";
                echo "<td>" . $riga['ORAENTRATA'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nessun utente trovato.</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="home.html">Torna alla Home</a>
</center>
</body>
</html>
