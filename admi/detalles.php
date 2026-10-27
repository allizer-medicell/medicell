
<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../login/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
    <link rel="stylesheet" href="../css/detalles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
        <body>
</body>
    </div>
    <div>
            <video id="videoFondo" autoplay muted loop playsinline style="
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
        <br>
            <div class="logo">
                <tr>
                    <td class="img">
                        <a href="../Index.php"><img src="../imagenes/logo.png" alt="MEDICELL"class="tama" style="animation: latir 2.20s infinite ease-in-out;"></a>
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
                    Conócenos
                </h1>
            </div>
            <div>  
                <nav>
                    <a class="btn" href="../Index.php">
                        Inicio
                    </a>
                    <a class="btm" href="../Procesos/Servicios.php">
                        Descubre lo que podemos hacer
                    </a>
                </nav>
            </div>
            <div>
                <a href="https://wa.me/50252117999" target="_blank" style="
                position: fixed; bottom: 35px; right: 50px; width: 80px; height: 80px; 
                background: #25D366; border-radius: 50%; display: flex; align-items: 
                center; justify-content: center; z-index: 9999; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4); animation: pulse 2s infinite;">
                    <img src="../imagenes/whats.png" alt="WhatsApp" style="width: 60px; height: 60px; width: 60px; object-fit: contain;">
                </a>

            <style>
                @keyframes pulse {
                0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6); }
                70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
                100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
                }
            </style> 
        </div>
            <br><br>
            <div class="cuadros"> 
                <div class="cuadro"; style="max-width: 1200px; margin: 0 auto; border: 4px solid #fbd0a2; border-radius: 20px; padding: 30px;  box-shadow: 0 4px 15px rgba(218, 222, 228, 0.99); text-align: center; ">
                    <div class="cuadro"; style="max-width: 1200px; margin: 0 auto; border: 4px solid #fbd0a2; border-radius: 20px; padding: 30px;  box-shadow: 0 4px 15px rgba(218, 222, 228, 0.99); text-align: center; ">
                    <h3>¿Que es medicell</h3>
                    <p>Somos Medicell Guatemala, un negocio enfocado en el mundo de la tecnología móvil y en las soluciones que las personas necesitan para sus celulares.
                    Sabemos lo importante que es tu dispositivo en tu día a día. Por eso, buscamos ofrecerte una atención personalizada,
                    escuchar tus necesidades y ayudarte a encontrar la solución más adecuada para ti.
                    Nos esforzamos por construir una relación con cada cliente basada en la confianza, la transparencia y el compromiso. 
                    Para nosotros, cada persona merece una buena atención y cada equipo merece ser tratado con responsabilidad.No se trata solamente de tecnología, 
                    sino de ayudarte a seguir conectado con lo que más importa.</p>
                </div>
                <br><br>
                <div class="cuadro"; style="max-width: 1200px; margin: 0 auto; border: 4px solid #fbd0a2; border-radius: 20px; padding: 30px;  box-shadow: 0 4px 15px rgba(218, 222, 228, 0.99); text-align: center; ">
                    <h3>Mision</h3>
                    <p>Nuestra misión es brindar soluciones tecnológicas que faciliten la vida de nuestros clientes, ofreciendo atención personalizada, 
                    orientación clara y servicios relacionados con los dispositivos móviles.
                    Trabajamos con responsabilidad, honestidad y compromiso, procurando que cada persona se sienta escuchada, atendida y segura al elegirnos. 
                    Queremos que nuestros clientes encuentren soluciones prácticas y una experiencia positiva cada vez que acudan a Medicell Guatemala.</p>
                </div>
                <br><br>
                <div class="cuadro"; style="max-width: 1200px; margin: 0 auto; border: 4px solid #fbd0a2; border-radius: 20px; padding: 30px;  box-shadow: 0 4px 15px rgba(218, 222, 228, 0.99); text-align: center; ">
                    <h3>Vision</h3>
                    <p>Queremos crecer y convertirnos en una empresa reconocida en Guatemala por la confianza de nuestros clientes, 
                    la calidad de nuestros servicios y nuestra pasión por la tecnología.
                    Aspiramos a mantenernos actualizados frente a los avances tecnológicos,
                    mejorar continuamente nuestra atención y crear relaciones duraderas con las personas que nos eligen.
                    Nuestro objetivo es que, cuando alguien necesite una solución para su dispositivo móvil, piense en Medicell Guatemala como una opción confiable, 
                    cercana y comprometida con sus necesidades.</p>
                </div>
                <br><br>
                <div class="cuadro"; style="max-width: 1200px; margin: 0 auto; border: 4px solid #fbd0a2; border-radius: 20px; padding: 30px;  box-shadow: 0 4px 15px rgba(218, 222, 228, 0.99); text-align: center; ">
                    <h3>Nuestros valores</h3>
                    <p>nuestros valores son el corazón de todo lo que hacemos. Creemos en la honestidad para hablarte con claridad, 
                    en el respeto para hacerte sentir bienvenido, 
                    en la responsabilidad para dar lo mejor de nosotros y en la confianza para construir una relación duradera contigo.
                    Nos apasiona la tecnología y nos motiva innovar, mejorar cada día y ofrecerte una atención cercana, amable y de calidad. 
                    Porque para nosotros, ¡no se trata solo de celulares, sino de conectar contigo y ayudarte a mantenerte conectado con lo que más importa</p>
                </div>
                <br><br>
                <div class="cuadro"; style="max-width: 1200px; margin: 0 auto; border: 4px solid #fbd0a2; border-radius: 20px; padding: 30px;  box-shadow: 0 4px 15px rgba(218, 222, 228, 0.99); text-align: center; ">
                    <h3>Nuestra experiencia</h3>
                    <p>En Medicell, nuestra experiencia se orienta a comprender las necesidades de las personas que utilizan dispositivos móviles y a buscar alternativas para ayudarlas.
                    Sabemos que un problema con tu celular puede afectar tus actividades diarias. Por eso, consideramos importante escucharte, 
                    explicarte las opciones disponibles y orientarte para que puedas tomar la mejor decisión según tus necesidades.
                    Nos interesa que tu experiencia no termine al recibir un servicio. Queremos que también te lleves una buena impresión de nuestra atención,
                    la tranquilidad de haber recibido orientación y la confianza de saber que tus dudas son importantes.
                    Seguimos trabajando con la intención de aprender, mejorar y ofrecer una atención cada vez más cercana a nuestros clientes.</p>
                </div>
                </div>
            </div>
            <br><br>
            <div class="opciones-usuario">
        <a href="../login/logout.php">Cerrar sesión</a>
    </div>
    <br><br>
<script>
const video = document.getElementById("videoFondo");

if (video) {
    video.muted = true;
    video.defaultMuted = true;
    video.loop = true;
    video.playsInline = true;

    function iniciarVideo() {
        video.play().catch(function (error) {
            console.log("No se pudo iniciar el video:", error);
        });
    }

    video.addEventListener("canplay", iniciarVideo, { once: true });
    iniciarVideo();

    document.addEventListener("visibilitychange", function () {
        if (!document.hidden) {
            iniciarVideo();
        }
    });
}
</script>
</body>
</html>