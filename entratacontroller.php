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
         
?>
