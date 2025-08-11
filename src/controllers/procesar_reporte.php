<?php 
//conexion a la base de datos
include '../config/Conexion.php';
// Recoger datos del formulario
$titulo = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$ubicacion = $_POST['ubic'];
$estado = 'Perdido'; // Asumimos que el formulario es para objetos perdidos
$reportado_por = 1; // Puedes cambiar esto según el usuario logueado

// Manejo de imagen
$image_url = '';
if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    $nombreImagen = basename($_FILES['img']['name']);
    $rutaDestino = "uploads/" . $nombreImagen;
    move_uploaded_file($_FILES['img']['tmp_name'], $rutaDestino);
    $image_url = $rutaDestino;
}

// Insertar en la base de datos
$sql = "INSERT INTO objetos (titulo, descripcion, categoria, ubicacion, estado, image_url, reportado_por)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $titulo, $descripcion, $categoria, $ubicacion, $estado, $image_url, $reportado_por);

if ($stmt->execute()) {
    echo "Reporte enviado correctamente.";
} else {
    echo "Error al enviar el reporte: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>