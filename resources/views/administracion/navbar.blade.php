<!DOCTYPE html>
<html lang="es">
<head>

    <!-- Características de HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos CSS -->   
    <link href="css/navbar.css" rel="stylesheet"/>
    <!-- <link href="{!! asset('css/navbar.css') !!}" rel="stylesheet"/> -->
    <!-- <link href="{{ asset('css/navbar.css') }}" rel="stylesheet"/> -->

    <!-- Otros enlaces y estilos para las vistas individuales que mandan a llamar al menú de navegación -->
    @yield('estilos_adicionales')

    <!-- Títulos individuales de cada vista para la pestaña -->
    <title>@yield('title', 'NAVBAR')</title>

</head>
<body>

    <!-- Barra de navegación superior -->
    <nav class="navbar-top">
        <div class="logo">
            <img src="archivos/logo_gris_fondo.png" alt="">
        </div>
        <div class="usuario" id="img-user">
            <img src="archivos/usuario.png" alt="">
            <div class="info-usuario">
                <div class="nombre-rol">
                    <span class="nombre">Bladimir Cielo Cuautle</span>
                    <span class="rol">Administrador</span>
                </div>
            </div>
        </div>
        <div class="nav-icons">
            <img src="svg/bell.svg" alt="">
            <img src="svg/full.svg" alt="">
            <img src="svg/config.svg" alt="">
        </div>
    </nav>

    <!-- Segunda barra de navegación fija con menú desplegable -->
    <nav class="navbar-second">
        <ul class="menu">
            <li class="menu-item">
                <img src="svg/insumos.svg" alt="">
                <span>Insumos</span>
                <i class="ico dropdown-icon">▼</i>
                <a href="#">
                    <ul class="dropdown">
                        <li>Crear</li>
                        <li>Modificar</li>
                        <li>Eliminar</li>
                        <li>Consultar</li>
                        <li>Surtir</li>
                    </ul>
                </a>
            </li>
            <li class="menu-item">
                <img src="svg/platillos.svg" alt="">
                <span>Platillos</span>
                <i class="ico dropdown-icon">▼</i>
                <a href="#">
                    <ul class="dropdown">
                        <li>Crear</li>
                        <li>Modificar</li>
                        <li>Eliminar</li>
                        <li>Consultar</li>
                    </ul>
                </a>
            </li>
            <li class="menu-item">
                <a href="#">
                    <img src="svg/menu.svg" alt="">
                    <span>Menú</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#">
                    <img src="svg/calendario.svg" alt="">
                    <span>Reservaciones</span>
                </a>
            </li>
            <li class="menu-item">
                <img src="svg/ventas.svg" alt="">
                <span>Ventas</span>
                <i class="ico dropdown-icon">▼</i>
                <a href="#">
                    <ul class="dropdown">
                        <li>Realizar venta</li>
                        <li>Reportes</li>
                    </ul>
                </a>
            </li>
            <li class="menu-item">
                <a href="#">
                    <img src="svg/pedidos.svg" alt="">
                    <span>Pedidos a domicilio</span>
                </a>
            </li>
            <li class="menu-item">
                <img src="svg/empleados.svg" alt="">
                <span>Empleados</span>
                <i class="ico dropdown-icon">▼</i>
                <a href="#">
                    <ul class="dropdown">
                        <li>Crear</li>
                        <li>Modificar</li>
                        <li>Eliminar</li>
                        <li>Consultar</li>
                    </ul>
                </a>
            </li>
        </ul>
    </nav>
    
    
    <!-- Sección para las vistas -->
    <main  class="main-content">
        @yield('contenido')
    </main>

    <!-- Sección para JavaScript -->
    @yield('scripts')
    
</body>
</html>