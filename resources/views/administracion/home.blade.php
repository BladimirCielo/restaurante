@extends('administracion.navbar')

@section('title', 'Inicio | Los Almuerzos')

@section('estilos_adicionales')
    <!-- <link href="{{ asset('css/home.css') }}" rel="stylesheet"> -->
    <link href="css/home.css" rel="stylesheet">
@endsection

@section('contenido')

    <!-- Cuerpo de la página -->
    <div class="nota" id="nota">
        <h2>¡Bienvenido!</h2>
        <p>Aquí puedes ver que sucede con tu negocio.</p>
    </div>
    <!-- Primera sección con dos contenedores -->
    <h2>Reportes</h2>
    <section class="reportes">
        <div class="cards">
            <div class="best-selling">
                <h2>Reservaciones</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Personas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Manuel Hernández</td>
                            <td>Martes, Noviembre 10</td>
                            <td>13:30</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="top-sellers">
                <h2>Ventas</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Tipo venta</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Domingo, Noviembre 3</td>
                            <td>16:29</td>
                            <td>Local</td>
                            <td>$1,300.00</td>
                        </tr>
                        <!-- Add more seller rows as needed -->
                    </tbody>
                </table>
            </div>
    </section>

    <!-- SECCIÓN: Apartados -->
    <h2>Menú - Apartados</h2>
    <section class="cont-apartados">
        <div class="card entradas">
            <img src="img/entradas.png" alt="">
            <span>Entradas</span>
        </div>
        <div class="card sopas">
            <img src="img/sopa.png" alt="">
            <span>Sopas</span>
        </div>
        <div class="card ensaladas">
            <img src="img/ensaladas.png" alt="">
            <span>Ensaladas</span>
        </div>
        <div class="card postres">
            <img src="img/postres.png" alt="">
            <span>Postres</span>
        </div>
        <div class="card bebidas">
            <img src="img/bebidas.png" alt="">
            <span>Bebidas</span>
        </div>
        <div class="card infantil">
            <img src="img/infantil.png" alt="">
            <span>Menú infantil</span>
        </div>
        <div class="card infantil">
            <img src="img/especicialidades.png" alt="">
            <span>Especialidades</span>
        </div>
        <div class="card infantil">
            <img src="img/promos.png" alt="">
            <span>Promociones</span>
        </div>
    </section>

@stop