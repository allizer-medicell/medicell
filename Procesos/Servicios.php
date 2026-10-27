<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            servicios - medicell
        </title>
        <link rel="stylesheet" href="../css/servi.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <video <video id="videoFondo" autoplay muted loop playsinline webkit-playsinline style="
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                object-fit: cover;
                z-index: -1;
                ">
                <source src="../video/vi.mp4" type="video/mp4">
                     Tu navegador no soporta videos.
                </video>
        </div>
            <div class="logo">
                <tr>
                    <td class="img">
                        <a href="../Index.php"><img src="../imagenes/logo.png" alt="MEDICELL" class="tama" style="animation: latir 2.20s infinite ease-in-out;"></a>
                    <style>
                        @keyframes latir {
                            0% {transform: scale(1);}
                            50% {transform: scale(1.15);}
                            100% {transform: scale(1);}
                        }
                    </style>
                    </td>
                </tr>
                <h1 style="text-shadow: 2px 2px 4px rgba(0,0,0.5);">
                Servicios
                </h1>
            </div>
            <div>  
                <nav>
                    <a class="btn" href="../Index.php">
                        Inicio
                    </a>
                    <a class="btm" href="../admi/detalles.php">
                        ¿Quieres saber mas sobre Medicell?
                    </a>
                </nav>
            </div>
        <div>
                <a href="https://wa.me/50252117999" target="_blank" style="
                position: fixed; bottom: 70px; right: 100px; width: 200px; height: 200px; 
                background: #25D366; border-radius: 50%; display: flex; align-items: 
                center; justify-content: center; z-index: 9999; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4); animation: pulse 2s infinite;">
                    <img src="../imagenes/whats.png" alt="WhatsApp">
                </a>

            <style>
                @keyframes pulse {
                0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6); }
                70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
                100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
                }
            </style> 
        </div>
        <h2>Reparación de Celulares</h2>
    <div class="fila">
        <div class="cuadro">
            <h3>Samsung</h3>
            <img src="../imagenes/cel.jpeg">
            <p>Cambio de pantalla y batería</p>
        </div>
        <div class="cuadro">
            <h3>iPhone</h3>
            <img src="../imagenes/ip.jpeg">
            <p>Reparación confiable</p>
        </div>
        <div class="cuadro">
            <h3>Xiaomi</h3>
            <img src="../imagenes/images.jpeg">
            <p>Servicio rápido</p>
        </div>
</div>
        <footer>
           Reparaciones en 2 horas
        </footer>
        
        
<script>
const video = document.getElementById("videoFondo");

if (video) {
    video.muted = true;
    video.defaultMuted = true;
    video.loop = true;
    video.playsInline = true;

    function reproducirVideo() {
        video.play().catch(function (error) {
            console.log("El navegador bloqueó la reproducción:", error);
        });
    }

    video.addEventListener("canplay", reproducirVideo, {
        once: true
    });

    reproducirVideo();
}
</script>

       
<?php
    require_once __DIR__ . '/../Procesos/Conexion.php';
    class Movil extends Conexion
{
    public function listarMovil()
    {
        $db = $this->abrirConexion();

        try {
            $ejecutar = $db->query("SELECT * FROM movil");

            $movil = $ejecutar->fetch_all(MYSQLI_ASSOC);

            $ejecutar->free();

            return $movil;

        } catch (Throwable $e) {
            error_log("Error al listar móviles: " . $e->getMessage());
            return [];

        } finally {
            $this->cerrarConexion($db);
        }
    }
}

$movil = new Movil();
$listar = $movil->listarMovil();
?>

    </body>
</html>

