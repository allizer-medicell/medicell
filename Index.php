<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#061321">
    <title>Bienvenidos a Medicell</title>
    <link rel="stylesheet" href="css/porta.css">
     <meta http-equiv="refresh" content="60;url=portada.php">
</head>
<button id="sonidoBtn" class="sonido-btn" type="button">
    <img src="imagenes/ola.png" alt="" class="icono-sonido">
</button>
<body>
     <p>
            <a href="portada.php"></a>.
        </p>
    <video id="videoFondo" autoplay muted loop playsinline
           webkit-playsinline preload="auto">
        <source src="video/hol.mp4" type="video/mp4">
    </video>

    <div class="fondo-oscuro"></div>

<main class="portada">

    <div class="encabezado">
        <img src="imagenes/logo.png"
             alt="Logo de Medicell" class="logo">

        <h1>¡bienvenidos a medicell!</h1>
    </div>
</main>

    <div class="continuar">
        <a href="portada.php">
            Comencemos→
        </a>
    </div>

    <footer class="pie">
        Medicell Guatemala · Tecnología y confianza
    </footer>

    <script>
    const video = document.getElementById("videoFondo");
    const sonidoBtn = document.getElementById("sonidoBtn");

    video.muted = true;
    video.defaultMuted = true;

    function iniciarVideo() {
        video.play().catch(function () {});
    }

    iniciarVideo();

    document.addEventListener("visibilitychange", function () {
        if (!document.hidden) { 
            iniciarVideo();
        }
    });

    sonidoBtn.addEventListener("click", function () {
        video.muted = !video.muted;

        if (!video.muted) {
            video.volume = 1;
            sonidoBtn.textContent = "🔇";
        } else {
            sonidoBtn.textContent = "🔊";
        }
    });
    </script>
    

    <?php
        require_once __DIR__ . '/Procesos/Conexion.php';

        $conex = new Conexion();
        $db = $conex->abrirConexion();
        $conex->cerrarConexion($db);
    ?>
</body>
</html>
    </body>
</html>
