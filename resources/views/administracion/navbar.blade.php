<!DOCTYPE html>
<html lang="es">
<head>

    <!-- Características de HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos CSS -->   
    <link href="css/navbar.css" rel="stylesheet"/>

    <!-- Otros enlaces y estilos para las vistas individuales que mandan a llamar al menú de navegación -->
    @yield('estilos_adicionales')

    <!-- Títulos individuales de cada vista para la pestaña -->
    <title>@yield('title', 'NAVBAR')</title>

</head>
<body>

    <!-- Barra de navegación superior -->
    <nav class="navbar-top">
        <div class="logo">
            <img src="archivos/logo.png" alt="">
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
        <div class="nav-icons-cont">
            <a href="{{ route('inicio') }}" target="_blank">
                <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none">
                    <path d="M340 4736 c-148 -32 -272 -141 -321 -283 -19 -55 -19 -102 -19 -1970 0 -1619 2 -1919 14 -1947 21 -50 81 -112 134 -138 l47 -23 2365 0 c2178 0 2368 1 2401 17 54 24 114 82 138 133 l21 45 -2 1883 -3 1882 -27 50 c-35 68 -97 128 -166 162 l-57 28 -1112 5 -1112 5 -31 62 c-57 115 74 103 -1149 102 -786 0 -1080 -4 -1121 -13z m2271 -421 c82 -154 149 -283 149 -287 0 -5 -587 -8 -1305 -8 l-1305 0 0 179 0 179 33 63 c37 72 85 115 159 140 50 17 107 18 1087 16 l1034 -2 148 -280z m2242 99 c45 -23 76 -53 98 -96 16 -31 19 -59 19 -168 l0 -130 -1016 2 -1016 3 -108 203 -108 202 1050 0 c946 0 1052 -2 1081 -16z m117 -2178 l0 -1633 -22 -28 c-46 -59 113 -55 -2388 -55 -2501 0 -2342 -4 -2388 55 l-22 28 0 1633 0 1634 2410 0 2410 0 0 -1634z"/>
                    <path d="M526 4510 c-101 -32 -157 -186 -107 -295 71 -157 315 -151 377 10 23 62 16 161 -15 207 -41 59 -85 82 -160 85 -36 1 -79 -2 -95 -7z"/> <path d="M1036 4510 c-135 -43 -170 -267 -57 -363 104 -87 291 -42 332 80 18 57 14 137 -11 189 -33 66 -85 98 -169 101 -36 1 -79 -2 -95 -7z"/> <path d="M1535 4501 c-81 -37 -121 -113 -112 -214 16 -177 225 -249 353 -122 102 102 70 277 -61 336 -51 24 -129 24 -180 0z"/>
                    <path d="M668 3486 c-61 -22 -114 -72 -147 -138 l-31 -61 0 -637 c0 -712 -2 -691 70 -773 23 -25 62 -54 92 -68 l53 -24 1855 0 1855 0 47 22 c63 29 123 93 148 159 19 53 20 75 20 673 0 699 1 688 -73 768 -23 26 -64 57 -92 69 l-50 24 -1855 -1 c-1505 0 -1862 -2 -1892 -13z m3750 -154 c64 -46 62 -20 62 -689 0 -588 -1 -609 -20 -640 -11 -18 -23 -33 -27 -33 -4 0 -228 220 -498 489 -569 568 -541 546 -705 546 -164 0 -177 -8 -447 -278 l-223 -221 -223 222 c-271 269 -284 277 -447 277 -165 0 -137 22 -705 -546 -270 -269 -493 -489 -498 -489 -4 0 -16 15 -27 33 -19 31 -20 52 -20 643 l0 611 23 34 c12 19 38 42 57 52 33 16 137 17 1850 15 l1815 -3 33 -23z m-2440 -488 c24 -9 115 -93 255 -232 l217 -217 -232 -232 -233 -233 -555 0 -555 0 445 446 c245 245 461 454 480 464 43 24 127 26 178 4z m1340 -3 c20 -11 237 -220 482 -465 l445 -446 -1020 0 -1020 0 445 446 c245 245 461 454 480 464 48 26 139 26 188 1z"/> <path d="M2475 3248 c-118 -41 -187 -179 -151 -302 20 -67 73 -131 131 -157 48 -22 151 -25 199 -5 193 81 203 354 17 449 -59 29 -137 35 -196 15z m144 -164 c42 -35 44 -98 5 -138 -51 -51 -152 -21 -155 46 -5 103 77 154 150 92z"/> <path d="M1082 3234 c-26 -18 -30 -79 -8 -110 14 -18 31 -19 318 -22 297 -3 305 -2 331 18 34 27 37 80 7 110 -19 19 -33 20 -323 20 -258 0 -306 -2 -325 -16z"/> <path d="M3250 3212 c-28 -22 -30 -84 -4 -113 16 -18 33 -19 326 -19 295 0 309 1 328 20 30 30 27 83 -6 109 -26 20 -38 21 -324 21 -271 0 -300 -2 -320 -18z"/>
                    <path d="M3736 2979 c-33 -26 -36 -79 -6 -109 19 -19 33 -20 328 -20 287 0 310 1 325 18 24 26 22 87 -3 112 -19 19 -33 20 -319 20 -287 0 -299 -1 -325 -21z"/><path d="M750 2950 c-28 -28 -26 -81 3 -108 23 -22 29 -22 325 -22 289 0 303 1 322 20 26 26 27 90 2 113 -16 15 -54 17 -325 17 -294 0 -308 -1 -327 -20z"/> <path d="M725 1478 c-29 -16 -35 -28 -35 -69 0 -22 7 -42 18 -52 17 -16 160 -17 1854 -17 1765 0 1836 1 1851 18 27 30 22 87 -9 111 l-27 21 -1816 0 c-1335 -1 -1821 -4 -1836 -12z"/> <path d="M712 1024 c-29 -20 -31 -85 -2 -114 20 -20 29 -20 1856 -18 1804 3 1836 3 1850 22 21 29 18 82 -6 106 -20 20 -33 20 -1848 20 -1638 0 -1830 -2 -1850 -16z"/> </g>
                </svg>
                <span>Página Oficial</span>
            </a>
            <div class="nav-icon">
                <a href="#">
                    <svg class="iconos-nav" version="1.0" xmlns="http://www.w3.org/2000/svg"  width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none">
                        <path d="M285 5101 c-108 -39 -199 -121 -251 -226 l-29 -60 0 -2040 0 -2040 32 -65 c18 -36 46 -81 62 -101 70 -84 101 -97 829 -340 l687 -230 105 3 c96 3 112 6 173 36 81 40 156 111 191 180 43 84 56 154 56 294 l0 128 394 0 c394 0 395 0 475 25 196 62 353 236 396 440 12 56 15 172 15 590 0 520 0 521 -22 565
                        -32 61 -66 83 -135 88 -49 3 -64 0 -93 -20 -19 -13 -45 -39 -57 -57 l-23 -34 0 -517 c0 -581 0 -583 -70 -662 -23 -26 -61 -55 -92 -69 -52 -24 -58 -24 -420 -27 l-368 -3 0 1669 c0 1086 -4 1688 -10 1723 -20 105 -90 211 -181 275 -24 17 -130 59 -253 101 l-211 72 695 -2 695 -2 53 -24 c31 -14 69 -43 92 -69 70 -79 70 -81 70 -662 l0 -517 23 -34 c12 -18 38 -44 57 -57 29 -20 44 -23 93 -20 69 5 103 27 135 88 22 44 22 45 22 565 0 418 -3 534 -15 590 -43 204 -200 378 -396 440 l-80 25 -1297 0 c-1226 -1 -1300 -2 -1347 -19z m810 -524 c352 -118 650 -219 663 -226 55 -30 52 95 52 -2000 0 -1178 -4 -1939 -9 -1954 -16
                        -41 -51 -67 -90 -67 -20 0 -326 97 -685 216 -494 165 -655 223 -672 240 -12 13 -24 41 -28 62 -11 67 -7 3824 4 3864 13 45 52 78 94 78 17 0 319 -96 671 -213z"/> <path d="M4072 3820 c-48 -29 -72 -75 -72 -138 0 -29 5 -63 11 -75 6 -12 133 -145 282 -294 l272 -273 -845 0 -845 0 -36 -24 c-92 -63 -92 -209 0 -272 l36 -24 845 0 845 0 -272 -272 c-149 -150 -276 -283 -282 -295 -6 -12 -11 -46 -11 -75 0 -97 61 -158 158 -158 29 0 63 5 75 11 31 16 855 838 873 871 8 15 14 50 14 78 0 28 -6 63 -14 78 -18 33 -842 855 -873 871 -36 18 -124 13 -161 -9z"/> </g>
                    </svg>
                    <span>Salir</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Segunda barra de navegación fija con menú desplegable -->
    <nav class="navbar-second">
        <ul class="menu">
            <li class="menu-item">
                <img src="svg/insumos.svg" alt="">
                <span>Insumos</span>
                <i class="ico dropdown-icon">▼</i>
                <ul class="dropdown">
                    <a href="#">
                        <li>Crear</li>
                    </a>    
                    <a href="#">
                        <li>Modificar</li>
                    </a>    
                    <a href="#">
                        <li>Eliminar</li>
                    </a>    
                    <a href="#">
                        <li>Consultar</li>
                    </a>    
                    <a href="#">
                        <li>Surtir</li>
                    </a>    
                </ul>                
            </li>
            <li class="menu-item">
                <img src="svg/platillos.svg" alt="">
                <span>Platillos</span>
                <i class="ico dropdown-icon">▼</i>
                <ul class="dropdown">
                    <a href="#">
                        <li>Crear</li>
                    </a>    
                    <a href="#">
                        <li>Modificar</li>
                    </a>    
                    <a href="#">
                        <li>Eliminar</li>
                    </a>    
                    <a href="#">
                        <li>Consultar</li>
                    </a>    
                </ul>
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
                <ul class="dropdown">
                    <a href="#">
                        <li>Realizar venta</li>
                    </a>    
                    <a href="#">
                        <li>Reportes</li>
                    </a>
                </ul>
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
                <ul class="dropdown">
                    <a href="#">
                        <li>Crear</li>
                    </a>    
                    <a href="#">
                        <li>Modificar</li>
                    </a>    
                    <a href="#">
                        <li>Eliminar</li>
                    </a>    
                    <a href="#">
                        <li>Consultar</li>
                    </a>    
                </ul>
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