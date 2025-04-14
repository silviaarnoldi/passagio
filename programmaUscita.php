<?php
include "connessione.php";
session_start();

date_default_timezone_set("Europe/Rome");

// Calcola l'intervallo delle ultime 8 ore
$ora_limite = date("Y-m-d H:i:s", strtotime("-8 hours"));
$data_oggi = date("Y-m-d");

// Prende gli utenti:
$query = "SELECT * FROM passagio 
          WHERE ORAUSCITA IS NULL 
          AND ORAENTRATA >= '$ora_limite'
          AND DATE(ORAENTRATA) = '$data_oggi'
          ORDER BY ORAENTRATA DESC";

$risultato = $connessione->query($query);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Utenti presenti (ultime 8 ore)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style2.css">
    <img src="img/logo2.png" width="200" height="53"> 
    <script>
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
</head>
<body>
<center>
    <h1>Utenti presenti (entrati nelle ultime 8 ore)</h1>

    <table>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Motivo</th>
            <th>Persona da Visitare</th>
            <th>Ora Entrata</th>
            <th>Segna Uscita</th>
        </tr>
        <?php
        if ($risultato && $risultato->num_rows > 0) {
            while ($riga = $risultato->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($riga['NOME']) . "</td>";
                echo "<td>" . htmlspecialchars($riga['COGNOME']) . "</td>";
                echo "<td>" . htmlspecialchars($riga['MOTIVO']) . "</td>";
                echo "<td>" . htmlspecialchars($riga['PERSONA_DA_VISITARE']) . "</td>";
                echo "<td>" . $riga['ORAENTRATA'] . "</td>";
                echo "<td>
                        <form action='uscitacontroller.php' method='post' style='display:inline;'>
                            <input type='hidden' name='nome' value='" . htmlspecialchars($riga['NOME']) . "'>
                            <input type='hidden' name='cognome' value='" . htmlspecialchars($riga['COGNOME']) . "'>
                            <input type='submit' value='Segna Uscita'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nessun utente presente nelle ultime 8 ore.</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="home.html">Torna alla Home</a>
</center>
<button onclick="scrollToTop()" class="scroll-to-top">↑ Torna su</button>
</body>
</html>