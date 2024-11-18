@extends('administracion.navbar')

@section('title', 'Menú | Los Almuerzos')

@section('estilos_adicionales')
    <link href="css/menu.css?=3" rel="stylesheet">
@endsection

@section('contenido')

<div class="header-photo">
    <img src="img/menu.jpg" alt="">
</div>

<div class="cajapadre">
    <div class="boton-section">
        <h2>Apartados</h2>
        <div class="cont-btn-apartado">
            <button class="btn-create">
                Nuevo apartado
            </button>
        </div>
    </div>

    <div class="apartados-cont">
        
        <div class="card-apartado">
            <div class="apartado header">
                <h2>Apartado 1</h2>
                <div class="botones">
                    <button class="btn-edit">
                        Cambiar nombre
                    </button>
                    <button class="btn-delete">
                        Eliminar apartado
                    </button>
                </div>
            </div>
            <div class="descripcion">
                <span>Descripción aquí</span>
            </div>
            <div class="apartado cont">
                <div class="tabla-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre platillo/bebida</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Huevos al gusto</td>
                                <td>$65.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>

    </div>
</div>

@stop