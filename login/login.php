<?php
session_start();

require_once __DIR__ . '/../Procesos/conexion.php';

if (isset($_SESSION["usuario_id"])) {
    header("Location: ../admi/detalles.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $correo = trim($_POST["correo"] ?? "");
    $password = $_POST["contrasena"] ?? "";

    if ($correo === "" || $password === "") {
        $error = "Ingresa tu correo y contraseña.";

    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = "El correo electrónico no es válido.";

    } elseif (!preg_match('/^[0-9]{8}$/', $password)) {
        $error = "La contraseña debe tener exactamente 8 dígitos.";

    } else {
        try {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            $conexion = new Conexion();
            $db = $conexion->abrirConexion();

            $stmt = $db->prepare(
                "SELECT id, nombre, correo, password_hash
                 FROM bd_medicell_usuario
                 WHERE correo = ?
                 LIMIT 1"
            );

            $stmt->bind_param("s", $correo);
            $stmt->execute();

            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_assoc();

            if ($usuario &&
                password_verify($password, $usuario["password_hash"])) {

                session_regenerate_id(true);

                $_SESSION["usuario_id"] = $usuario["id"];
                $_SESSION["usuario_nombre"] = $usuario["nombre"];
                $_SESSION["usuario_correo"] = $usuario["correo"];

                $stmt->close();
                $db->close();

                header("Location: ../admi/detalles.php");
                exit;

            } else {
                $error = "Correo o contraseña incorrectos.";
            }

            $stmt->close();
            $db->close();

        } catch (Throwable $e) {
            error_log("Error en login Medicell: " . $e->getMessage());
            $error = "No se pudo iniciar sesión. Revisa la conexión y la tabla de usuarios.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Medicell</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<main class="login-contenedor">

    <h2>Iniciar sesión</h2>

    <?php if ($error !== ""): ?>
        <div class="error">
            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login.php">

        <label for="correo">Correo electrónico:</label>
        <input
            type="email"
            id="correo"
            name="correo"
            autocomplete="email"
            required
        >

        <label for="contrasena">Contraseña (8 dígitos):</label>
        <input
            type="password"
            id="contrasena"
            name="contrasena"
            minlength="8"
            maxlength="8"
            pattern="[0-9]{8}"
            inputmode="numeric"
            autocomplete="current-password"
            required
        >

        <button type="submit">Iniciar sesión</button>

    </form>

    <div class="login-enlaces">
        ¿No tienes cuenta?
        <a href="registro.php">Crear cuenta</a>
    </div>

    <div class="login-enlaces">
        <a href="cambio.php">Cambiar contraseña</a>
    </div>

</main>

</body>
</html>