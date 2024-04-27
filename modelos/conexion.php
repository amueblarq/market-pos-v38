<?php
class Conexion {
    public static function conectar() {
        $servidor = "217.15.171.64"; // Cambia esto según tu configuración
        $usuario = "Amueblarq1"; // Cambia esto según tu configuración
        $contrasena = "Amueblarq.270"; // Cambia esto según tu configuración
        $nombre_db = "sistema_poss"; // Cambia esto según tu configuración

        try {
            $conexion = new PDO("mysql:host=$servidor;dbname=$nombre_db", $usuario, $contrasena);
            // Establecer el modo de error de PDO a excepción
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Establecer el conjunto de caracteres
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        } catch (PDOException $e) {
            // Si hay un error al conectar, lanzar una excepción
            throw new PDOException("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }
}
?>

