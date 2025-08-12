<?php
$servername = "localhost";      // Servidor
$username = "root";        // Usuario por defecto en XAMPP
$password = "";         // Contraseña (vacía por defecto en XAMPP)
$dbname = "uptxfinder"; // Nombre de la base

// Crear conexión
<<<<<<< HEAD
$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);
=======
$conn = new mysqli($servername, $username, $password, $dbname);
>>>>>>> b19d586ac8de05804b3dca96bddffd600adbaaaa

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa";
?>