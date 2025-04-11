<?php
include "connessione.php";
session_start();
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$persona_da_visitare=$_POST['persona_da_visitare'];
$qualifica_societa=$_POST['qualifica_societa'];
$data = date("Y-m-d"); 
$oraentrata = date("Y-m-d H:i:s");
$registra="insert into passagio (nome, cognome, motivo, persona_da_visitare, dataoggi,oraentrata) values ('$nome', '$cognome', '$qualifica_societa', '$persona_da_visitare', '$data','$oraentrata')";
 //echo "QUERY [".$registra."]<br/>";
$connessione->query($registra);
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
                echo "Entrata effetuata";
                echo "<br>";
                echo "<a href='home.html'class='button'>Torna alla home</a>";
                echo "</center>";
         
?>
