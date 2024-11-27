@extends('administracion.navbar')

@section('title', 'Completa tu pedido | Los Almuerzos')

@section('estilos_adicionales')
    <!-- <link href="css/consultapedidos.css" rel="stylesheet"> -->

    <!-- <link href="http://localhost/restaurante/public/css/consultapedidos.css" rel="stylesheet">
    <link href="http://localhost/restaurante/public/css/navbar.css" rel="stylesheet"> -->

    <link href="{{ asset('restaurante/public/css/consultapedidos.css') }}" rel="stylesheet">

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
                        <label for="">Fecha del pedido</label>
                        <label for="">Nombre del cliente</label>
                    </td>
                </tr>
                <td>
                    <input type="text" readonly value="{{ $infoPedido->id_venta }}">
                    <input type="text" name="fecha_venta" readonly value="{{ $infoPedido->fecha_venta }}">
                    <input type="text" name="nombre_cliente" readonly value="{{ $infoPedido->nombre_cliente }}">
                </td>
                <tr>
                </tr>
                <tr>
                    <td>
                        <label for="">Hora de salida</label>
                        <label for="">Estado del pedido</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="hora_salida" placeholder="HH:MM:SS">
                        @if($errors->first('hora_salida'))
                            <p class="text-warning">{{ $errors->first('hora_salida') }}</p>
                        @endif
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
