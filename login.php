<!DOCTYPE html>
<html lang="">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/style.css">
    </head>
<body>
    <br>
    <br>
    <br>
    <center>
    <img src="img/logo.png" alt="logo" style="max-width: 100%; height: auto;">
    </center>

    <center><h1>Login</h1>
    <form action="logincontroller.php" method="post">
        <input type="text" name="username" placeholder="username"><br> <br>
        <input type="password" name="password" placeholder="password"><br> <br>
        <input type="submit" value="Login">
    </form>
    <a href="home.html">Torna alla Home</a></center>
    <?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?>
</body>
</html>