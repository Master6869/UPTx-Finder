<?php
$servername = "localhost"; // Servidor
$username = "root"; // Usuario por defecto en XAMPP
$password = "Lemastic_Ser_Adm!1"; // Contraseña (vacía por defecto en XAMPP)
$dbname = "uptxfinder"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>