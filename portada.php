
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Medicell
        </title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    
    <body> 
         
        <div>
            <video autoplay muted loop playsinline webkit-playsinline style=" 
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                object-fit: cover;
                z-index: -1;">
                <source src="video/vi.mp4" type="video/mp4">
                     Tu navegador no soporta videos.
                </video>
        </div>
        
        <div class="cons">
                <div class="img1">
                <a href="index.php">
                    <img src="imagenes/logo.png" alt="medicel" class="tamano" style="animation: latir 2.20s infinite ease-in-out;">
                    <style>
                        @keyframes latir {
                            0% {transform: scale(1);}
                            50% {transform: scale(1.15);}
                            100% {transform: scale(1);}
                        }
                    </style>
                </a>
                <h1 style="text-shadow: 1px 2px 4px rgba(0,0,0.5);">medicell</h1>
            </div>
        </div>
        <div style="text-align: center; padding: 20px;">
            <nav style="display: flex; flex-wrap:wrap; justify-content: center; gap:10px;  ">
                 <a class="btn" href="Procesos/Servicios.php">Descubre lo que podemos hacer</a>
                 <a class="btm" href="admi/detalles.php">¿Quieres saber mas sobre Medicell?</a>
            </nav>
        </div>
        <footer><marquee>Reparaciones en 2 horas</marquee> </footer>
    <div class="col-span-2">
        <div style="max-width: 1000px; width: 95%; margin: 0 auto; border: 4px solid #fbd0a2; border-radius: 20px; padding: 30px;  box-shadow: 0 4px 15px rgba(218, 222, 228, 0.99); text-align: center;">
      
            <h3 style="color: #fff6f6; margin: 0 0 25px 0; font-size: 50px;">Visitanos</h3>
      
            <p style="font-size: 20px; color: #ffffff; margin: 0 0 15px 0; font-weight: 500;">
            15-73 4 Avenida, Zona 10, Guatemala
            </p>
      
            <a href="https://maps.app.goo.gl/Sqdz5emoHFzPGm1b7" target="_blank" style="display: block; border-radius: 40px; overflow: hidden; margin-bottom: 15px; text-decoration: none;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3822.8903480978866!2d-90.51488078972047!3d14.633109384590467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!
            1s0x8589f3d9c9c9c9c9%3A0x2a0b1c8c0c8c8c8c!2sMedicell%2C+4ta+Avenida+
            15-73+Zona+10%2C+Ciudad+de+Guatemala!5e0!3m2!1ses!2sgt!4v1728445000000!5m2!1ses!2sgt"
             width="100%" height="300" style="border:0; pointer-events:none;" loading="lazy"></iframe>
            </a>
            <div style="border-top: 3px solid #fbd0a2; padding-top: 15px; ">
            <h4 style="color: #fff7f7; font-size: 35px; margin: 0 0 8px 0;">Horarios</h4>
        <br>
            <p style="font-size: 35px; color: #ffffff; margin: 4px 0;">Lunes a Viernes: 9:00 A.M a 18:00 P.M</p>
            <p style="font-size: 35px; color: #fffcfc; margin: 4px 0;">Sábados: 9:00 A.M a 14:00 P.M</p>
            </div>  
        </div>

    </div >
    <div>            
        <a href="https://wa.me/50252117999" target="_blank" class="whatsapp-btn" style="
        position: fixed;
        background: #25D366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
        text-decoration: none;
        z-index: 9999;
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
        animation: pulse 2s infinite;
            "><img src="imagenes/whats.png" alt="WhatsApp" style="width: 100px; height: 100px; width: 100px; object-fit: contain;"></a>

<style>
@keyframes pulse {
  0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6); }
  70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
  100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
}
.whatsapp-btn:hover {
  transform: scale(1.15);
  transition: transform 0.2s ease;
}
</style>

<style>
@keyframes pulse {
  0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6); }
  70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
  100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
}
</style> 
            </div>
        <script>
const video = document.getElementById("videoFondo");

if (video) {
    video.muted = true;
    video.defaultMuted = true;
    video.loop = true;
    video.playsInline = true;
    video.setAttribute("muted", "");
    video.setAttribute("playsinline", "");
    video.setAttribute("webkit-playsinline", "");

    function iniciarVideo() {
        if (video.paused) {
            video.play().catch(function (error) {
                console.log("No se pudo iniciar el video:", error);
            });
        }
    }

    if (video.readyState >= 2) {
        iniciarVideo();
    } else {
        video.addEventListener("canplay", iniciarVideo, {
            once: true
        });
    }

    document.addEventListener("touchstart", iniciarVideo, {
        once: true,
        passive: true
    });
}
</script>
</body>
</html>
