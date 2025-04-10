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
           
            <br>
            <form action="entratacontroller.php" method="post">
        <input type="text" name="nome" placeholder="nome"> <br> <br>
        <input type="text" name="cognome" placeholder="cognome"> <br> <br>
        <input type="text" name="persona_da_visitare" placeholder="persona da visitare"> <br> <br>
        <input type="text" name="qualifica_societa" placeholder="Qualifica e societa' o ente di appartenenza">
        <input type="text" name="username" placeholder="username"> <br> <br>
        <input type="text" name="password" placeholder="password">  <br> <br>
        <input type="submit" value="Entra">
    </form>
    <a href="profile.php">Torna alla Home</a>
    </center>