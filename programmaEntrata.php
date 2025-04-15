<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">
  <img src="img/logo2.png" width="200" height="80"> 
</head>
<body>
  <center>
    <h1>ENTRATA UTENTE:</h1>

    <form action="entratacontroller.php" method="post" onsubmit="return prepareSignature();">
      <h3>Nome:</h3>
      <input type="text" name="nome" required><br> 
      
      <h3>Cognome:</h3>
      <input type="text" name="cognome" required><br> 
      
      <h3>Persona da visitare:</h3>
      <input type="text" name="persona_da_visitare" required><br>

      <h3>Qualifica e società/ente:</h3>
      <input type="text" name="qualifica_societa"><br>

      <h3>Firma:</h3>
      <canvas id="signature-pad" width="400" height="200" style="border:1px solid #ccc;"></canvas><br>
      <button type="button" onclick="clearPad()">Cancella firma</button><br>
      <input type="hidden" name="firma" id="firma">

      <br><br>
      <input type="submit" value="Entra">
    </form>

    <br><a href="home.html">Torna alla Home</a>

    <p>
      Questo sito rispetta la tua privacy. I tuoi dati personali sono trattati con attenzione e non saranno condivisi senza il tuo consenso.
    </p>
    <p>
      Per ulteriori informazioni, consulta la nostra <a href="privacy.html">Informativa sulla Privacy</a>.
    </p>
  </center>

  <script>
    const canvas = document.getElementById("signature-pad");
    const ctx = canvas.getContext("2d");
    let drawing = false;

    canvas.addEventListener("mousedown", () => { drawing = true; ctx.beginPath(); });
    canvas.addEventListener("mouseup", () => { drawing = false; });
    canvas.addEventListener("mousemove", draw);

    function draw(e) {
      if (!drawing) return;
      ctx.lineWidth = 2;
      ctx.lineCap = "round";
      ctx.strokeStyle = "#000";
      const rect = canvas.getBoundingClientRect();
      ctx.lineTo(e.clientX - rect.left, e.clientY - rect.top);
      ctx.stroke();
      ctx.beginPath();
      ctx.moveTo(e.clientX - rect.left, e.clientY - rect.top);
    }

    function clearPad() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.beginPath();
    }

    function prepareSignature() {
      const firmaInput = document.getElementById("firma");
      const dataURL = canvas.toDataURL("image/png");

      // Controllo se la firma è vuota
      const emptyCanvas = document.createElement("canvas");
      emptyCanvas.width = canvas.width;
      emptyCanvas.height = canvas.height;

      if (canvas.toDataURL() === emptyCanvas.toDataURL()) {
        alert("Per favore, firma prima di inviare.");
        return false;
      }

      firmaInput.value = dataURL;
      return true;
    }
  </script>
</body>
</html>