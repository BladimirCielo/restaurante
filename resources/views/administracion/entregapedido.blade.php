@extends('administracion.navbar')

@section('title', 'Completa tu pedido | Los Almuerzos')

@section('estilos_adicionales')

    <link href="{{ asset('restaurante/public/css/consultapedidos.css') }}" rel="stylesheet">

    <style>
        /* Alinear contenido de la tabla al centro */
        .info-pedido {
            width: 100%;
            border-collapse: collapse;
            text-align: center; /* Centra horizontalmente */
            vertical-align: middle; /* Centra verticalmente */
        }

        .info-pedido td, .info-pedido th {
            padding: 10px; /* Espaciado interno */
        }

        /* Estilos redondeados para los inputs */
        .info-pedido input[type="text"] {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 8px 12px;
            width: 100%;
            box-sizing: border-box; /* Evita que los bordes aumenten el tamaño del input */
        }

        /* Eliminar hover de las filas de la tabla */
        .info-pedido tr:hover {
            background-color: transparent; /* Quita el color de hover */
        }

        /* Estilos redondeados para el botón guardar */
        .btn input[type="submit"] {
            border-radius: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn input[type="submit"]:hover {
            background-color: #0056b3; /* Color más oscuro al pasar el ratón */
        }

        /* Estilo adicional para la clase cont-principal */
        .cont-principal {
            margin: auto;
            padding: 20px;
            max-width: 600px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
</style>


@endsection

@section('contenido')    

    <div class="cont-principal">
        <form class="fomulario" action="{{ route('guardarPedido') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id_venta" value="{{ $infoPedido->id_venta }}">

            <div class="titulo">
                <h1>Entregar pedido</h1>
            </div>
            <div class="message">
            @if (Session::has('mensaje'))
                    <div class="alert alert-dismissible alert-secondary">
                        <button type="button" class="btn-close boton" data-bs-dismiss="alert"></button>
                        <strong>{{ Session::get('mensaje') }}</strong>

                    </div>
                @endif
            </div>

            <table class="info-pedido">
                <tr>
                    <td>
                        <label for="">Número de pedido</label>
                    </td>
                    <td>
                        <label for="">Fecha del pedido</label>
                    </td>
                    <td>
                        <label for="">Nombre del cliente</label>

                    </td>
                </tr>
                    <td>
                        <input type="text" readonly value="{{ $infoPedido->id_venta }}">
                        </td>
                        <td>
                        <input type="text" name="fecha_venta" readonly value="{{ $infoPedido->fecha_venta }}">
                        </td>
                        <td>
                        <input type="text" name="nombre_cliente" readonly value="{{ $infoPedido->nombre_cliente }}">
                    </td>
                <tr>
                </tr>
                <tr>
                    <td>
                        <label for="">Hora de salida</label>
                        </td>
                        <td>
                        <label for="">Estado del pedido</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="hora_salida" placeholder="HH:MM:SS">
                        @if($errors->first('hora_salida'))
                            <p class="text-warning">{{ $errors->first('hora_salida') }}</p>
                        @endif
                        </td>
                        <td>
                        <input type="text" name="estado" placeholder="Enviado/Completado /Cancelado">
                        @if($errors->first('estado'))
                            <p class="text-warning">{{ $errors->first('estado') }}</p>
                        @endif
                    </td>
                </tr>
            </table>
            <div class="btn">
                <input type="submit" class="btn btn-lg btn-primary" name="guardar" value="Guardar">
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@stop
