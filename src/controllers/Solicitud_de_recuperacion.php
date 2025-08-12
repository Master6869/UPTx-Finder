<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicirud de reporte</title>
    <link rel="stylesheet" href="css/style-estado-de-pago.css">
</head>

<body>
    <?php
    // Conexión a la base de datos
    include '../config/Conexion-BD-Workbench.php';
    // Recoger datos del formulario
    $id_objeto = $_POST['id_objeto'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];
    $correo = $_POST['correo'];

    // Manejo de imagen de evidencia
    $evidencia_url = '';
    if (isset($_FILES['evidencia']) && $_FILES['evidencia']['error'] == 0) {
        $nombreImagen = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $_FILES['evidencia']['name']);
        $rutaDestino = "uploads/evidencias/" . $nombreImagen;

        // Asegúrate de que la carpeta exista
        if (!is_dir("uploads/evidencias")) {
            mkdir("uploads/evidencias", 0777, true);
        }

        move_uploaded_file($_FILES['evidencia']['tmp_name'], $rutaDestino);
        $evidencia_url = $rutaDestino;
    }

    // Insertar en la tabla solicitudes_recuperacion
    $sql = "INSERT INTO solicitudes_recuperacion (id_objeto, lugar, descripcion, evidencia, correo)
        VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $id_objeto, $lugar, $descripcion, $evidencia_url, $correo);

    if ($stmt->execute()) {
        echo '
        <div class="checkmark-circle" data-aos="fade-up">
        <div class="checkmark" ></div>
        </div>
        <div class="mensaje" data-aos="fade-up">Solicitud enviada correctamente. Te contactaremos pronto.</div>
        <br><br>
        <a href="index.php" data-aos="fade-up"><button class="btn">Volver al inicio</button></a>

        ';

        // Notificación por correo (versión básica)
        $to = "cristophermac8@gmail.com"; // Cambia esto por tu correo real
        $subject = "Nueva solicitud de recuperación";
        $message = "Solicitud para objeto ID: $id_objeto\nCorreo: $correo\nLugar: $lugar\nDescripción: $descripcion";
        mail($to, $subject, $message);
    } else {
        echo '
        <div class="error-circle" data-aos="fade-up">
        <div class="error-x"></div>
        </div>
        <div class="mensaje"data-aos="fade-up" >Ah ocurrido un error al enviar el reporte</div>
        <div class="detalle-error" data-aos="fade-up"><?php echo htmlspecialchars($message); ?></div>
        <br><br>
        <a href="index.php" data-aos="fade-up"><button class="btn">Volver al inicio</button></a>

        ' . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
    ?>
</body>

</html>