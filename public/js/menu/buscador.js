$('#input-busqueda').on('input', function(){
    var busqueda = $(this).val().toLowerCase();
    $('#tabla-resultados tbody tr').each(function() {
        var nombreProducto = $(this).find('td:nth-child(2)').text().toLowerCase();
        var codigoProducto = $(this).find('td:nth-child(1)').text().toLowerCase();
        if (nombreProducto.includes(busqueda) || codigoProducto.includes(busqueda)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});