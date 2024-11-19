/*--
    Autor: Jose Bladimir Cielo Cuautle
    Fecha: Marzo 11, 2024
    Descripción: Archivo que genera un nuevo documento html con los datos
    de la tabla que muestra el reporte para su posterior impresión.
--*/

function imprimir() {
    // Obtener el contenido HTML de la tabla
    var tabla = document.getElementById('tablaDatos').outerHTML;

    // Crear un nuevo documento para imprimir
    var ventanaImpresion = window.open('', '_blank');

    // Escribir el contenido HTML en el nuevo documento
    ventanaImpresion.document.write('<html><head><title>Los almuerzos</title>');
    
    // Estilos CSS para la tabla y el encabezado
    ventanaImpresion.document.write('<style>');
    ventanaImpresion.document.write(`
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 20px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px auto;
            width: 150px;
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    `);
    ventanaImpresion.document.write('</style>');
    ventanaImpresion.document.write('</head><body>');
    
    // Añadir el logo, título y tabla
    ventanaImpresion.document.write('<img class="logo" src="archivos/logo.png" alt="Logo de la empresa">');
    ventanaImpresion.document.write('<h1>Pedidos a domicilio</h1>');
    ventanaImpresion.document.write(tabla);

    // Cerrar el contenido HTML
    ventanaImpresion.document.write('</body></html>');
    
    // Imprimir el documento
    ventanaImpresion.print();
    
    // Cerrar el documento después de imprimir
    ventanaImpresion.close();
}
