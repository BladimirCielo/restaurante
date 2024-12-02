<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class landingpagecontroller extends controller {


    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción: Función que obtiene la información de los apartados así como sus
    // platillos asignados y los manda a la vista para ordenar en línea. -->
    public function landing() {
        $consulta = \DB::table('apartados')
                ->leftJoin('platillos_apartados', 'apartados.id_apartado', '=', 'platillos_apartados.id_apartado')
                ->leftJoin('platillos', 'platillos_apartados.id_platillo', '=', 'platillos.id_platillo')
                ->select(
                    'apartados.id_apartado', 
                    'apartados.nombre_apartado', 
                    'apartados.descripcion', 
                    'platillos.id_platillo', 
                    'platillos.nombre_platillo', 
                    'platillos.precio_venta')
            ->get();
                
            $apartados = $consulta->groupBy('id_apartado');
        
            $platillos = \DB::select("SELECT id_platillo, id_categoria, nombre_platillo, descripcion, precio_venta
                FROM platillos
                ORDER BY nombre_platillo ASC");

        return view ('landingpage.index')
            ->with('apartados', $apartados)
            ->with('platillos',$platillos);
    }

    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción: Función que permite la inserción de los datos del pedido realizado en línea para pedidos de tipo domicilio.
    public function registrarPedido(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre_cliente' => 'required|max:150|regex:/^[A-Z][A-Z,a-z, ,á,í,ó,é,ú,ü,ñ,Ñ]+$/',
            'direccion' => 'required|regex:/^[0-9,A-Z][A-Z,a-z, ,á,í,ó,é,ú,ü,ñ,Ñ,#,.,0-9,\,]+$/'
        ]);

        // Obtén los datos del formulario
        $nombre_cliente = $request->input('nombre_cliente');
        $direccion = $request->input('direccion');
        $total = $request->input('total_hidden');

        // Realizar inserción en la base de datos
        $insertapedido = DB::insert(
            "INSERT INTO ventas (id_empleado, id_metpag, fecha_venta, total_venta, tipo, nombre_cliente, direccion_envio, costo_envio, hora_salida, estado)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [
                null, // id_empleado
                1, // id_metpag
                date('Y-m-d'), // fecha_venta (fecha actual en formato DATE)
                $total, // total_venta
                'Domicilio', // tipo
                $nombre_cliente, // nombre_cliente
                $direccion, // direccion_envio
                0.00, // costo_envio
                '00:00:00', // hora_salida
                'Pendiente', // estado
            ]
        );

        return redirect()->route('landing');
    }

}