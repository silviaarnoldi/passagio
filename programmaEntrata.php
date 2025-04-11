<?php
include "connessione.php";
session_start();

?>
<!DOCTYPE html>
<html lang="">
<head>
    <!--
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     Collegamento al tuo file CSS 
    <link rel="stylesheet" href="CSS/stylehome.css">
    <img src="img/logo.png" width="250" height="100"> -->
</head>
    <body>
        <center>
            <h1>ENTRATA UTENTE:</h1>
            <form action="entratacontroller.php" method="post">
            <h3>Nome:</h3>
            <input type="text" name="nome" placeholder="nome"> <br> 
            <h3>Cognome:</h3>
            <input type="text" name="cognome" placeholder="cognome"> <br> 
            <h3>Persona da visitare:</h3>
            <input type="text" name="persona_da_visitare" placeholder="persona da visitare"> <br>
            <h3>Qualifica e societa' o ente di appartenenza:</h3>
            <input type="text" name="qualifica_societa" placeholder="Qualifica e societa' o ente di appartenenza">
        <br> <br><input type="submit" value="Entra">
    </form>
    <br> 
    <a href="home.html">Torna alla Home</a>
    </center>