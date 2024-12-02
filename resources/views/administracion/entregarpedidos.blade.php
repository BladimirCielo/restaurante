@extends('administracion.navbar')

@section('title', 'Entregar pedidos | Los Almuerzos')

@section('estilos_adicionales')
<!-- Autor: Jose Bladimir Cielo Cuautle
  Fecha: Noviembre 27, 2024
  Descripción: Vista para la consulta de pedidos a domicilio para el rol de repartidor. -->
    <link href="css/consultapedidos.css" rel="stylesheet">

    <style>
        .btn-entregar {
            background:var(--btn-accept-bk);
        }
        .btn-entregar:hover {
            background:var(--btn-accept-bkhover);
        }
        #entregas,
        #pedidossvg {
            color: var(--texto-submenu-hover);
            fill: var(--texto-submenu-hover);
        }
    </style>
@endsection

@section('contenido')    

    <div class="cont-principal">
        <div class="buscador">
            <span>Buscar pedido</span>
            <input type="text" id="input-busqueda-pedidos" name="busqueda" placeholder="Ingresa el número de pedido" maxlength="30">
        </div>

        <div id="tablaDatos">
            <table>
                <thead>
                    <tr>
                        <th>No pedido</th>
                        <th>Fecha</th>
                        <th>Nombre cliente</th>
                        <th>Dirección cliente</th>
                        <th>Costo envío</th>
                        <th>Total venta</th>
                        <th>Hora salida</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id_venta }}</td>
                            <td>{{ $venta->fecha_venta }}</td>
                            <td>{{ $venta->nombre_cliente }}</td>
                            <td>{{ $venta->direccion_envio }}</td>
                            <td>${{ number_format($venta->costo_envio, 2) }}</td>
                            <td>${{ number_format($venta->total_venta, 2) }}</td>
                            <td>{{ $venta->hora_salida }}</td>
                            <td>{{ $venta->estado }}</td>
                            <td>
                                @if($venta->estado == 'Enviado' || $venta->estado == 'Pendiente')
                                    <a href="{{ route('completarPedido', $venta->id_venta) }}" class="btn-entregar">Modificar</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        // Buscador en tiempo real para la tabla de pedidos
        $(document).ready(function() {
            $('#input-busqueda-pedidos').on('input', function() {
                var busqueda = $(this).val().trim().toLowerCase(); // Obtiene el texto de búsqueda y lo convierte a minúsculas
                $('#tablaDatos tbody tr').each(function() {
                    var codigoPedido = $(this).find('td:nth-child(1)').text().trim().toLowerCase(); // Obtiene el texto del primer TD
                    if (codigoPedido.includes(busqueda)) {
                        $(this).show(); // Muestra la fila si coincide con la búsqueda
                    } else {
                        $(this).hide(); // Oculta la fila si no coincide
                    }
                });
            });
        });
    </script>

@stop
