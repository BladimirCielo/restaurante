<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function registrarPedido(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'total_venta' => 'required|numeric|min:0',
        ]);

        // Insertar la venta en la base de datos
        DB::table('ventas')->insert([
            'id_empleado' => 1, // Cambiar según corresponda
            'id_metpag' => 1, // Cambiar según corresponda
            'fecha_venta' => Carbon::now()->toDateString(),
            'total_venta' => $validated['total_venta'],
            'tipo' => 'Domicilio', // Cambiar si es necesario
            'nombre_cliente' => $validated['nombre_cliente'],
            'direccion_envio' => $validated['direccion'],
            'costo_envio' => null, // Cambiar según corresponda
            'hora_salida' => null, // Cambiar si es necesario
            'estado' => 'Pendiente', // Cambiar según corresponda
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Venta registrada exitosamente.');
    }

}