<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<!-- Autor: Jose Bladimir Cielo Cuautle
  Fecha: Noviembre 27, 2024
  Descripción: Vista para la landing page del restaurante y para realizar pedidos a domicilio para el rol de cliente. -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with FoodHut landing page.">
    <meta name="author" content="Devcrud">
    <title>Los Almuerzos | Restaurante</title>

    <link rel="shortcut icon" href="landingpage-imgs/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="css/landingpage/pedidos.css">
   
    <!-- font icons -->
    <link rel="stylesheet" href="css/landingpage/vendors/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="css/landingpage/vendors/animate/animate.css">

    <!-- Bootstrap + FoodHut main styles -->
	<link rel="stylesheet" href="css/landingpage/foodhut.css">
	
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/landingpage/templatemo-klassy-cafe.css">

    <style>
        .panel-lateral ul#pedidoList {
    color: black; /* Cambia el color del texto dentro del ul a negro */
    list-style-type: none; /* Opcional: elimina los bullets si no los necesitas */
    margin: 0; /* Opcional: elimina márgenes */
    padding: 0; /* Opcional: elimina padding */
    font-family: Arial, sans-serif; /* Opcional: define una fuente */
    font-size: 16px; /* Opcional: ajusta el tamaño de la letra */
}

    </style>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Sobre nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Galería</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="landingpage-imgs/logo.png" class="brand-img" alt="">
                <img src="landingpage-imgs/logo.png" class="brand-txt" alt="">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#ordenar" class="btn btn-primary ml-xl-4 reservar">Ordenar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Ubicación</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#book-table">Contáctanos</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">Desde 1931</h1>
            <p class="display-4 mb-5">Para ti que buscas las experiencias más exclusivas en el tema de gastronomía gourmet, te traemos el más nuevo de nuestros restaurantes tradicionales.</p>
            <a class="btn btn-lg btn-primary" href="#ordenar">Ordenar a domicilio</a> <br>
            <a class="btn btn-lg btn-primary" href="#">Quiero reservar</a>
        </div>
    </header>

    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Sobre nosotros</h6>
                            <h2>Creando agradables recuerdos para tu paladar</h2>
                        </div>
                        <p>Somos un restaurante de comida gourmet tradicional, fundado desde 1931 por Augustín Pérez, orgulloso mexicano encantado por la gstronomía mexicana. Ubicados en Puebla capital, contamos con espacios agradables y por supuesto, con los mejores platillos.</p>
                        <div class="row">
                            <div class="col-4">
                                <img src="landingpage-imgs/gallary-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="landingpage-imgs/gallary-10.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="landingpage-imgs/gallary-12.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <!-- <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a> -->
                            <img src="landingpage-imgs/main.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <div class="cont-reservar text-center bg-dark text-light has-height-md middle-items wow fadeIn" id="ordenar">
        <h2 class="section-title">Pedido en línea</h2>
        <!-- <div class="main-content"> -->
            <section class="menu">
                <div class="categoria">
                    @foreach ($apartados as $id_apartado => $items)
                    <h3 class="titulos">{{ $items[0]->nombre_apartado }}</h3>
                    <div class="platillos scrolleable">
                        @foreach ($items as $item)
                        <div class="platillo">
                            <p class="nombre">{{ $item->nombre_platillo }}</p>
                            <p class="precio">${{ number_format($item->precio_venta, 2) }}</p>
                            <input type="number" class="cantidad" data-nombre="{{ $item->nombre_platillo }}" data-precio="{{ $item->precio_venta }}" placeholder="0" min="0">
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

            </section>

            <aside class="panel-lateral">
                <h2>Detalles del pedido</h2>
                <ul id="pedidoList"></ul>
                <div class="monto-total">
                    <p>Total: $<span id="total">0.00</span></p>
                </div>
                <section class="pedido">
                    <h2>Información de envío</h2>
                    <form id="ventaForm" action="{{ route('registrarPedido') }}" method="POST">
                    @csrf
                        <div>
                            <input type="text" id="nombre_cliente" name="nombre_cliente" placeholder="Ingresa tu nombre">
                            @if($errors->first('nombre_cliente'))
                                <p class="text-warning">{{$errors->first('nombre_cliente')}}</p>
                            @endif
                        </div>
                        <div>
                            <textarea id="direccion" placeholder="Ingresa tu dirección" name="direccion"></textarea>
                            @if($errors->first('direccion'))
                                <p class="text-warning">{{$errors->first('direccion')}}</p>
                            @endif
                            <!-- Total (se llena automáticamente) -->
                            <input type="hidden" id="total_hidden" name="total_hidden">
                        </div>
                        <button type="submit">Realizar pedido</button>
                    </form>
                </section>
            </aside>
        <!-- </div> -->

    </div>

<!--  gallary Section  -->
<div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
        <h2 class="section-title">Galería</h2>
    </div>
    <div class="gallary row">
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-1.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-2.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-3.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-5.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-7.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-8.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-9.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-10.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-11.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="landingpage-imgs/gallary-12.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
    </div>
    
	<!-- core  -->
    <script src="css/landingpage/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="css/landingpage/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="css/landingpage/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="css/landingpage/vendors/wow/wow.js"></script>
    
    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="js/landingpage/foodhut.js"></script>
    
    <script src="js/landingpage/pedidos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('.cantidad');
            const pedidoList = document.getElementById('pedidoList');
            const totalSpan = document.getElementById('total');

            let pedido = {};

            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    const nombre = input.dataset.nombre;
                    const precio = parseFloat(input.dataset.precio);
                    const cantidad = parseInt(input.value);

                    if (cantidad > 0) {
                        // Agregar o actualizar el platillo en el pedido
                        pedido[nombre] = { cantidad, subtotal: cantidad * precio };
                    } else {
                        // Eliminar el platillo si la cantidad es 0
                        delete pedido[nombre];
                    }

                    // Actualizar la lista y el total
                    actualizarPedido();
                });

                const totalElement = document.getElementById('total');
                const totalHiddenInput = document.getElementById('total_hidden');

                // Actualizar el campo oculto con el valor actual del total
                totalHiddenInput.value = parseFloat(totalElement.textContent);
            });

            function actualizarPedido() {
    // Limpiar la lista
    pedidoList.innerHTML = '';

    // Mostrar los platillos en la lista
    let total = 0;
    for (const [nombre, datos] of Object.entries(pedido)) {
        const li = document.createElement('li');
        li.textContent = `${nombre} - ${datos.cantidad} x $${datos.subtotal.toFixed(2)}`;
        pedidoList.appendChild(li);
        total += datos.subtotal;
    }

    // Actualizar el monto total
    totalSpan.textContent = total.toFixed(2);

    // Actualizar el campo oculto
    const totalHiddenInput = document.getElementById('total_hidden');
    totalHiddenInput.value = total.toFixed(2);
}

        });
    </script>

</body>
</html>
