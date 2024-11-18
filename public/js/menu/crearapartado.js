const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('btn-create');
    const closeModalBtn = document.getElementById('closeModalBtn');

    // Abrir la ventana modal
    openModalBtn.onclick = function() {
        modal.style.display = "block";
    }

    // Cerrar la ventana modal
    closeModalBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Cerrar la ventana modal si se hace clic fuera de ella
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }