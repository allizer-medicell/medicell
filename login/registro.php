
<?php
session_start();

require_once __DIR__ . '/../Procesos/Conexion.php';

if (isset($_SESSION["usuario_id"])) {
    header("Location: ../admi/detalles.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $password = $_POST["contraseña"] ?? "";

    if ($nombre === "" || $correo === "" || $password === "") {
        $error = "Completa todos los campos.";
    } elseif (strlen($nombre) > 200) {
        $error = "El nombre no puede superar los 200 caracteres.";
    } elseif (
        !filter_var($correo, FILTER_VALIDATE_EMAIL) ||
        strlen($correo) > 150
    ) {
        $error = "Escribe un correo electrónico válido.";
    } elseif (!preg_match('/^[0-9]{8}$/', $password)) {
        $error = "La contraseña debe tener exactamente 8 dígitos.";
    } else {
        $db = null;
        $verificar = null;
        $insertar = null;

        try {
            $conexion = new Conexion();
            $db = $conexion->abrirConexion();

            // Comprobar si el correo ya existe.
            $verificar = $db->prepare(
                "SELECT id FROM bd_medicell_usuario
                 WHERE correo = ? LIMIT 1"
            );

            $verificar->bind_param("s", $correo);
            $verificar->execute();
            $verificar->store_result();

            if ($verificar->num_rows > 0) {
                $error = "Este correo ya está registrado. Inicia sesión.";
            } else {
                // Proteger la contraseña antes de guardarla.
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $insertar = $db->prepare(
                    "INSERT INTO bd_medicell_usuario
                    (nombre, correo, password_hash, fecha_registro)
                    VALUES (?, ?, ?, NOW())"
                );

                $insertar->bind_param(
                    "sss",
                    $nombre,
                    $correo,
                    $hash
                );

                if ($insertar->execute()) {
                    // Iniciar sesión automáticamente.
                    $nuevoId = $db->insert_id;

                    session_regenerate_id(true);

                    $_SESSION["usuario_id"] = $nuevoId;
                    $_SESSION["usuario_nombre"] = $nombre;
                    $_SESSION["usuario_correo"] = $correo;

                    header("Location: ../admi/detalles.php");
                    exit;
                } else {
                    $error = "No se pudo crear la cuenta.";
                    error_log("Error de registro: " . $insertar->error);
                }
            }
        } catch (Throwable $e) {
            error_log("Error en registro: " . $e->getMessage());
            $error = "Ocurrió un error al crear la cuenta. Revisa la base de datos.";
        } finally {
            if ($verificar instanceof mysqli_stmt) {
                $verificar->close();
            }

            if ($insertar instanceof mysqli_stmt) {
                $insertar->close();
            }

            if ($db instanceof mysqli) {
                $db->close();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta - Medicell</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<main class="login-contenedor">
    <h2>Crear cuenta nueva</h2>

    <?php if ($error !== ""): ?>
        <div class="error">
            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="registro.php">
        <label for="nombre">Tu nombre:</label>
        <input
            type="text"
            id="nombre"
            name="nombre"
            maxlength="200"
            autocomplete="name"
            required
        >

        <label for="correo">Correo electrónico:</label>
        <input
            type="email"
            id="correo"
            name="correo"
            maxlength="150"
            autocomplete="email"
            required
        >

        <label for="contraseña">Contraseña (8 dígitos):</label>
        <input
            type="password"
            id="contraseña"
            name="contraseña"
            minlength="8"
            maxlength="8"
            pattern="[0-9]{8}"
            inputmode="numeric"
            autocomplete="new-password"
            title="Ingresa exactamente 8 números"
            required
        >

        <button type="submit">Crear mi cuenta</button>
    </form>

    <div class="login-enlaces">
        ¿Ya tienes cuenta?
        <a href="login.php">Inicia sesión</a>
    </div>
</main>

</body>
</html>
