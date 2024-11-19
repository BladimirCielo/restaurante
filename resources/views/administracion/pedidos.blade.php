@extends('administracion.navbar')

@section('title', 'Consultar pedidos | Los Almuerzos')

@section('estilos_adicionales')
    <link href="css/consultapedidos.css" rel="stylesheet">
@endsection

@section('contenido')    

    <div class="cont-principal">
        <!-- Formulario de Filtro -->
        <form method="GET" action="{{ route('consultar') }}">
            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" name="fecha_inicio" value="{{ request('fecha_inicio') }}">

            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="date" name="fecha_fin" value="{{ request('fecha_fin') }}">

            <button type="submit" class="btn-buscar">Buscar</button>
            <button type="button" class="btn-impr" onclick="imprimir()">Imprimir</button>
        </form>

        <!-- Tabla de Reporte de Ventas -->
        <table id="tablaDatos">
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="js/imprimirpedidos.js"></script>

@stop