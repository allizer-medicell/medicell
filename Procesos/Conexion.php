<?php

class Conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "";
    private $baseDatos = "bd_medicell";

    public function abrirConexion()
    {
        mysqli_report(MYSQLI_REPORT_OFF);

        $db = new mysqli(
            $this->servidor,
            $this->usuario,
            $this->password,
            $this->baseDatos
        );

        if ($db->connect_error) {
            error_log("Error MySQL: " . $db->connect_error);
            throw new RuntimeException(
                "No se pudo conectar con la base de datos."
            );
        }

        $db->set_charset("utf8mb4");

        return $db;
    }

    public function cerrarConexion($db)
    {
        if ($db instanceof mysqli) {
            $db->close();
        }
    }
}
