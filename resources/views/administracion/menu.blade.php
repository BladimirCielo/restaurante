@extends('administracion.navbar')

@section('title', 'Menú | Los Almuerzos')

@section('estilos_adicionales')
    <link href="css/menu.css?=7" rel="stylesheet">
@endsection

@section('contenido')

    <div class="header-photo">
        <img src="img/menu.jpg" alt="">
    </div>

    <div class="cajapadre">
        <div class="boton-section">
            <h2>Apartados</h2>
            <div class="cont-btn-apartado">
                <button class="btn-create" id="btn-create">
                    Nuevo apartado
                </button>
            </div>
            <div class="message">
            @if (Session::has('mensaje'))
                <div class="alert alert-dismissible alert-secondary">
                    <button type="button" class="btn-close boton" data-bs-dismiss="alert"></button>
                    <strong>{{ Session::get('mensaje') }}</strong>

                </div>
            @endif
            @if($errors->first('nombre_ap'))
                <p class="text-warning">{{$errors->first('nombre_ap')}}</p>
            @endif
            @if($errors->first('desc'))
                <p class="text-warning">{{$errors->first('desc')}}</p>
            @endif
            </div>
        </div>

        <div class="apartados-cont">
            @foreach ($apartados as $id_apartado => $items)
            <div class="card-apartado">
                <div class="apartado header">
                    <h2>{{ $items[0]->nombre_apartado }}</h2>
                    <div class="botones">
                        <a class="btn-edit" href="{{ route('apartadoeditar', ['id_apartado' => $items[0]->id_apartado]) }}">
                            <input type="button" class="badge bg-editar" value="Cambiar nombre">
                        </a>
                        <!-- <button class="btn-edit">
                            Cambiar nombre
                        </button> -->
                        <button class="btn-delete">
                            Eliminar apartado
                        </button>
                    </div>
                </div>
                <div class="descripcion">
                    <span>{{ $items[0]->descripcion }}</span>
                </div>
                <div class="apartado cont">
                    <div class="tabla-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->nombre_platillo }}</td>
                                        <td>${{ number_format($item->precio_venta, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Ventana Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span id="closeModalBtn" class="close">&times;</span>
            <div class="titulo">
                <h2>Crear nuevo apartado</h2>
            </div>
            <form class="formulario" action="{{ route('crearapartado') }}" method="POST" enctype="multipart/form-data" id="formCrearApartado">
                {{ csrf_field() }}

                <!-- Campos para el apartado -->
                <label for="nombre_ap">Nombre del Apartado</label>
                <input type="text" class="big" name="nombre_ap" placeholder="Ingresa el nombre" maxlength="80" value="{{ old('nombre_ap') }}" required>
                @if($errors->first('nombre_ap'))
                    <p class="text-warning">{{ $errors->first('nombre_ap') }}</p>
                @endif

                <label for="desc">Descripción</label>
                <input type="text" class="big" name="desc" placeholder="Ingresa la descripción" maxlength="100" value="{{ old('desc') }}" required>
                @if($errors->first('desc'))
                    <p class="text-warning">{{ $errors->first('desc') }}</p>
                @endif

                <!-- Sección de selección de platillos -->
                <div class="cont-platillos-add">
                    <!-- Agregar platillos -->
                    <div class="cont-izquierda">
                        <h3>Agregar platillos</h3>
                        <label for="">Buscar</label>
                        <input type="text" id="input-busqueda" name="busqueda" placeholder="Buscar platillo..." maxlength="30">
                        
                        <div class="tabla" id="tabla-resultados">
                            <table border="1">
                                <thead>
                                    <tr>
                                        <th>Platillo</th>
                                        <th>Precio Venta</th>
                                        <th>Seleccionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($platillos as $p)
                                    <tr>
                                        <td class="desborde">{{ $p->nombre_platillo }}</td>
                                        <td>${{ number_format($p->precio_venta, 2) }}</td>
                                        <td>
                                            <button type="button" class="btn-op plus" 
                                                data-id="{{ $p->id_platillo }}" 
                                                data-nombre="{{ $p->nombre_platillo }}" 
                                                data-precio="{{ $p->precio_venta }}">
                                                Agregar
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Platillos seleccionados -->
                    <div class="cont-derecha">
                        <h3>Lista de platillos seleccionados</h3>
                        <div class="contenedor-platillos">
                            <table border="1" class="tb-venta">
                                <thead>
                                    <tr>
                                        <th>Platillo</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-seleccionados">
                                    <!-- Aquí se agregarán los platillos seleccionados -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Campo oculto para enviar los IDs de los platillos seleccionados -->
                <input type="hidden" name="platillos" id="platillosSeleccionados">

                <!-- Botón de guardar -->
                <div class="btn">
                    <input type="submit" class="btn-accept" name="guardar" value="Guardar">
                </div>
            </form>
        </div>
    </div>

    <!-- Enlace a JQery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    
    <script src="js/menu/crearapartado.js?=2"></script>

    <script> 
        /* Almacenar los datos de los productos en un objeto JavaScript para actualizar la tabla de la venta */
        var productos = [
            @foreach($platillos as $p)
                {
                    nombre: "{{ $p->nombre_platillo }}",
                    precio: {{ $p->precio_venta }},
                },
            @endforeach
        ];

        /* Buscador en tiempo real en base a AJAX */
        $(document).ready(function(){
            $('#input-busqueda').on('input', function(){
                var busqueda = $(this).val().toLowerCase();
                $('#tabla-resultados tbody tr').each(function() {
                    var nombreProducto = $(this).find('td:nth-child(2)').text().toLowerCase();
                    var codigoProducto = $(this).find('td:nth-child(1)').text().toLowerCase();
                    if (nombreProducto.includes(busqueda) || codigoProducto.includes(busqueda)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });

        // Almacenar los platillos seleccionados
        let platillosSeleccionados = [];

        // Agregar platillo a la lista de seleccionados
        document.querySelectorAll('.btn-op.plus').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const precio = this.getAttribute('data-precio');

                if (!platillosSeleccionados.find(p => p.id == id)) {
                    platillosSeleccionados.push({ id, nombre, precio });

                    // Actualizar la tabla
                    const tablaSeleccionados = document.getElementById('tabla-seleccionados');
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${nombre}</td>
                        <td>$${parseFloat(precio).toFixed(2)}</td>
                        <td>
                            <button type="button" class="btn-delete" data-id="${id}">Eliminar</button>
                        </td>
                    `;
                    tablaSeleccionados.appendChild(row);

                    // Eliminar platillo de la lista
                    row.querySelector('.btn-delete').addEventListener('click', function() {
                        platillosSeleccionados = platillosSeleccionados.filter(p => p.id != id);
                        row.remove();
                        actualizarCampoOculto();
                    });
                }

                actualizarCampoOculto();
            });
        });

        // Actualizar el campo oculto con los IDs de los platillos seleccionados
        function actualizarCampoOculto() {
            const campo = document.getElementById('platillosSeleccionados');
            campo.value = JSON.stringify(platillosSeleccionados);
        }
        
    </script>

@stop