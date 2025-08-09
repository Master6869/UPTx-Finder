//Que la img subida se muestre en la pagina en el from 7 id="previewImage"
// y que se muestre una imagen por defecto si no hay img subida
document.addEventListener('DOMContentLoaded', function () {
    const preview = document.getElementById('previewImage');
    preview.src = 'imgs/img Defaiult.jpg'; // Imagen por defecto
    preview.style.display = 'block'; // Asegurarse de que la imagen por defecto
});
document.getElementById('img').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewImage');

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
});

