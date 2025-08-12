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
    <title>Document</title>
    <link rel="stylesheet" href="css/style-recupercion.css">
    <!--  Link Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <form action="Solicitud_de_recuperacion.php" class="formulario-objeto" method="POST" enctype="multipart/form-data">
        <h2>Reclamar objeto perdido</h2>

        <input type="hidden" name="id_objeto" value="<?php echo $objeto_id; ?>"> <!-- ID del objeto -->

        <label>¿Dónde lo perdiste?</label>
        <input type="text" name="lugar" required>

        <label>¿Qué características tiene?</label>
        <textarea name="descripcion" required></textarea>

        <label>Sube alguna imagen del objeto como evidencia de que sea tuyo (Si no tines una imagen sube
            alguna parecida)</label>
        <input type="file" id="img" name="evidencia" accept="image/*">
        <div class="img-priview">
            <img id="previewImage" src="#" alt="Vista previa">
        </div>

        <label>Agrega un metodo para contactarte como email o numero telefonico</label>
        <input type="text" name="correo" required>

        <button type="submit">Enviar solicitud</button>
    </form>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- Scrips -->
    <script src="public/scripts/mostrar_img.js"></script>
    <script src="public/scripts/script.js"></script>
</body>