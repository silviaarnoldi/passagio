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
    <a href="home.html"><img src="img/logo2.png" width="200" height="80"> </a>
    <link rel="stylesheet" href="CSS/style2.css">
    <script>
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
</head>
<body>
<center>
<h1>Lista di tutti gli utenti <form method="post" action="export.php"><button type="submit">Esporta dati</button></form></h1>  

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Motivo</th>
            <th>Persona da Visitare</th>
            <th>Data Oggi</th>
            <th>Ora Entrata</th>
            <th>Ora Uscita</th>
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
                echo "<td>" . $riga['ORAUSCITA'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nessun utente trovato.</td></tr>";
        }
        ?>
    </table>
    
    <br>
    
</center>
<button onclick="scrollToTop()" class="scroll-to-top">↑ Torna su</button>

</body>
</html>
