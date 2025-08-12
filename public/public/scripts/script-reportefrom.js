document.getElementById('reporteForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Evita que se recargue la página

    const formData = new FormData(this);

    fetch('../src/controllers/procesar_reporte.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            if (data.includes("Reporte enviado correctamente")) {
                console.log("success", "Reporte enviado correctamente");
            } else {
                console.log("error", "Error al enviar el reporte");
            }
        })
        .catch(error => {
            console.log("error", "Error de conexión");
            console.error(error);
        });
});