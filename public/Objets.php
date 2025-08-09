<?php
session_start();
// Conexión a la base de datos
include '../config/Conexion-BD-Workbench.php';

// objetos.php - Página para mostrar objetos individuales
if (isset($_GET['id'])) {
    $objeto_id = $_GET['id'];
    $consulta = "SELECT * FROM objetos WHERE id_objetos = '$objeto_id'";
    $result = mysqli_query($conn, $consulta);

    if ($result && $row = $result->fetch_array()) {
        // Procesar los datos del objeto
        $nombre = $row['titulo'];
        $descripcion = $row['descripcion'];
        $img = $row['image_url'];
        $categoria = $row['categoria'];
        $ubicacion = $row['ubicacion'];
        $estado = $row['estado'];
        $reportado_por = $row['reportado_por'];
        $fecha = $row['reported_at'];
    } else {
        // No se encontró el objeto
        $nombre = "Objeto no encontrado";
        $descripcion = "";
    }
} else {
    // No se proporcionó un ID
    $nombre = "ID de objeto no proporcionado";
    $descripcion = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objeto Perdido</title>
    <link rel="stylesheet" href="css/style-objets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!--Menu y menu m1ovil-->
    <header>
        <a href="#"><i class="fa fa-arrow-left"></i> Regresar al inicio</a>
    </header>
    <!--Fin del menu y menu movil-->
    <!-- Pagina donde se muestran los objetos de la base de datos por id -->
    <div class="container-objetos">
        <div class="image-container-objetos">
            <img src="<?php echo $img ?>" alt="Lentes perdidos">
        </div>
        <div class="info-objetos">
            <h1>Lentes</h1>
            <p><strong>Descripción:</strong> edefwfw f</p>
            <p><strong>Categoría:</strong> otro</p>
            <p><i class="fa fa-map-marker-alt"></i> <strong>Ubicación:</strong> En el UD4</p>
            <span class="status">Perdido</span>
            <p><strong>Reportado por:</strong> 1</p>
            <p><strong>Fecha:</strong> 2025-08-08 12:04:49</p>
        </div>
    </div>

</body>

</html>