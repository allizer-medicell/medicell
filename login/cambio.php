<?php
session_start();

require_once __DIR__ . '/../Procesos/conexion.php';

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

$error = "";
$exito = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $actual = $_POST["clave_actual"] ?? "";
    $nueva = $_POST["clave_nueva"] ?? "";
    $confirmar = $_POST["clave_confirma"] ?? "";

    if ($actual === "" || $nueva === "" || $confirmar === "") {
        $error = "Completa todos los campos.";
    } elseif (!preg_match('/^[0-9]{8}$/', $actual)) {
        $error = "La contraseña actual debe tener 8 dígitos.";
    } elseif (!preg_match('/^[0-9]{8}$/', $nueva)) {
        $error = "La nueva contraseña debe tener exactamente 8 dígitos.";
    } elseif ($nueva !== $confirmar) {
        $error = "Las contraseñas nuevas no coinciden.";
    } elseif ($actual === $nueva) {
        $error = "La nueva contraseña debe ser diferente a la actual.";
    } else {
        try {
            $conexion = new Conexion();
            $db = $conexion->abrirConexion();

            $stmt = $db->prepare(
            "SELECT password_hash
            FROM bd_medicell_usuario
            WHERE id = ?
            LIMIT 1"
);
            $stmt->bind_param("i", $_SESSION["usuario_id"]);
            $stmt->execute();

            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_assoc();

            if (
                $usuario &&
                password_verify($actual, $usuario["password_hash"])
            ) {
                $hash = password_hash($nueva, PASSWORD_DEFAULT);

                $update = $db->prepare(
                "UPDATE bd_medicell_usuario
                SET password_hash = ?
                WHERE id = ?"
                );

                $update->bind_param(
                    "si",
                    $hash,
                    $_SESSION["usuario_id"]
                );

                if ($update->execute() && $update->affected_rows === 1) {
                    $exito = "Tu contraseña se cambió correctamente.";
                } else {
                    $error = "No se pudo cambiar la contraseña.";
                }

                $update->close();
            } else {
                $error = "La contraseña actual es incorrecta.";
            }

            $stmt->close();
            $db->close();

        } catch (Throwable $e) {
            error_log($e->getMessage());
            $error = "No se pudo realizar el cambio.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña - Medicell</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<main class="login-contenedor">
    <h2>Cambiar contraseña</h2>

    <?php if ($error !== ""): ?>
        <div class="error">
            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <?php if ($exito !== ""): ?>
        <div class="exito">
            <?= htmlspecialchars($exito, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="cambio.php">
        <label for="clave_actual">Contraseña actual:</label>
        <input type="password" id="clave_actual" name="clave_actual"
               minlength="8" maxlength="8" pattern="[0-9]{8}"
               inputmode="numeric" autocomplete="current-password" required>

        <label for="clave_nueva">Nueva contraseña (8 dígitos):</label>
        <input type="password" id="clave_nueva" name="clave_nueva"
               minlength="8" maxlength="8" pattern="[0-9]{8}"
               inputmode="numeric" autocomplete="new-password" required>

        <label for="clave_confirma">Confirmar nueva contraseña:</label>
        <input type="password" id="clave_confirma" name="clave_confirma"
               minlength="8" maxlength="8" pattern="[0-9]{8}"
               inputmode="numeric" autocomplete="new-password" required>

        <button type="submit">Cambiar contraseña</button>
    </form>

    <div class="login-enlaces">
        <a href="../admi/detalles.php">Volver a Medicell</a>
    </div>
</main>
</body>
</html>
