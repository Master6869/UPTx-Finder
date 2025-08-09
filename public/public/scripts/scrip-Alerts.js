const notifications = document.querySelector(".notifications"),
    buttons = document.querySelectorAll(".buttons .btn");

// Object containing details for different types of toasts
const toastDetails = {
    timer: 5000,
    success: {
        icon: 'fa sólido fa-circle-check',
        text: 'Se agregó al carrito de compras correctamente.',
    },
    error: {
        icon: 'fa sólido fa-circle-xmark',
        text: 'Por favor, selecciona una talla antes de agregar al carrito.',
    },
    warning: {
        icon: 'fi fi-rr-star',
        text: 'Se agregó a tus favoritos.',
    },
    info: {
        icon: 'fa sólido fa-circle-info',
        text: 'Info: This is an information toast.',
    },
    successfavorite: {
        icon: 'fa-circle-check',
        text: 'Producto se eliminó de favoritos exitosamente.',
    },
    errorfavorite: {
        icon: 'fa sólido fa-circle-xmark',
        text: 'Este producto ya está en favoritos.',
    },
}
const removeToast = (toast) => {
    toast.classList.add("hide");
    if (toast.timeoutId) clearTimeout(toast.timeoutId); // Clearing the timeout for the toast
    setTimeout(() => toast.remove(), 500); // Removing the toast after 500ms
}

const createToast = (id) => {
    if (!toastDetails[id]) {
        console.error(`El ID '${id}' no está definido en toastDetails.`);
        return;
    }

    const { icon, text } = toastDetails[id];
    const toast = document.createElement("li");
    toast.className = `toast ${id}`;
    toast.innerHTML = `
    <div class="column">
        <i class="${icon}"></i>
        <span>${text}</span>
    </div>
        <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>`;
    notifications.appendChild(toast);
    toast.timeoutId = setTimeout(() => removeToast(toast), toastDetails.timer);
};

// Adding a click event listener to each button to create a toast when clicked
buttons.forEach(btn => {
    btn.addEventListener("click", () => createToast(btn.id));
});