//Que la img subida se muestre en la pagina en el from 7 id="previewImage"
document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("fileInput");
    const previewImage = document.getElementById("previewImage");
    const previewText = document.getElementById("previewText");

    fileInput.addEventListener("change", function () {
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
                previewText.style.display = "none";
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none";
            previewText.style.display = "block";
        }
    });
}
);

