<?php
$host = "localhost";      // Servidor
$usuario = "root";        // Usuario por defecto en XAMPP
$contrasena = "";         // Contraseña (vacía por defecto en XAMPP)
$base_de_datos = "uptxfinder"; // Nombre de la base

// Crear conexión
$conexion = new mysqli($alertas, $objetos, $usuarios);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

echo "Conexión exitosa";
?>