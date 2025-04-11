<?php
include "connessione.php";
session_start();
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$orauscita = date("Y-m-d H:i:s");
$update_query = "UPDATE passagio SET ORAUSCITA='$orauscita' WHERE Nome='$nome' AND Cognome='$cognome' AND ORAUSCITA IS NULL";    
    try {
        $connessione->query($update_query);
        echo "<head>";
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
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<center>";
        echo "<h1>Uscita effettuate</h1>";
        echo "<br>";
        echo "<a href='home.html'class='button'>Torna alla home</a>";
        echo "</center>";
    } catch (Exception $e) {
        $err = $e->getMessage();
       echo $err;
    }
         
?>
