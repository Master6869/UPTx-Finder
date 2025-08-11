<?php
$servername = "localhost";      // Servidor
$username = "root";        // Usuario por defecto en XAMPP
$password = "";         // Contraseña (vacía por defecto en XAMPP)
$dbname = "uptxfinder"; // Nombre de la base

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa";
?>