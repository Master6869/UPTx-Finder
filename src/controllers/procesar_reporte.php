<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar reporte</title>
    <link rel="stylesheet" href="css/style-estado-de-pago.css">
</head>

<body>
    <?php
    //conexion a la base de datos
    include '../config/Conexion-BD-Workbench.php';
    //Recoger datos del formulario
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
        echo '

<div class="checkmark-circle" data-aos="fade-up">
    <div class="checkmark" ></div>
</div>
<div class="mensaje" data-aos="fade-up">Se realizo el reporte con exito</div>
<br><br>
<a href="index.php" data-aos="fade-up"><button class="btn">Volver al inicio</button></a>

    ';
    } else {
        echo '
        <div class="error-circle" data-aos="fade-up">
    <div class="error-x"></div>
</div>
<div class="mensaje"data-aos="fade-up" >Ah ocurrido un error al enviar el reporte</div>
<div class="detalle-error" data-aos="fade-up"><?php echo htmlspecialchars($message); ?></div>
<br><br>
<a href="index.php" data-aos="fade-up"><button class="btn">Volver al inicio</button></a>

        ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    ?>
</body>

</html>