    document.addEventListener("DOMContentLoaded", () => {
    const cantidades = document.querySelectorAll(".cantidad");
    const pedidoList = document.getElementById("pedidoList");
    const totalSpan = document.getElementById("total");

    let pedido = [];

    cantidades.forEach(input => {
        input.addEventListener("input", () => {
            const nombre = input.dataset.nombre;
            const precio = parseFloat(input.dataset.precio);
            const cantidad = parseInt(input.value, 10) || 0;

            // Actualizar el pedido
            pedido = pedido.filter(p => p.nombre !== nombre);
            if (cantidad > 0) {
                pedido.push({ nombre, precio, cantidad });
            }

            actualizarPedido();
        });
    });

    function actualizarPedido() {
        // Limpiar lista
        pedidoList.innerHTML = "";

        // Actualizar total
        let total = 0;

        pedido.forEach(item => {
            const li = document.createElement("li");
            li.innerHTML = `
                <span>${item.nombre} x ${item.cantidad}</span>
                <span>$${(item.precio * item.cantidad).toFixed(2)}</span>
                <button data-nombre="${item.nombre}">Eliminar</button>
            `;
            pedidoList.appendChild(li);

            total += item.precio * item.cantidad;

            // Evento para eliminar
            li.querySelector("button").addEventListener("click", () => {
                pedido = pedido.filter(p => p.nombre !== item.nombre);
                actualizarPedido();
            });
        });

        totalSpan.textContent = total.toFixed(2);
    }
});