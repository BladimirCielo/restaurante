<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ventas;

use Session;

class pedidoscontroller extends controller {

    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción: Función que permite obtener un registro de las ventas registradas a domicilio
    // y las muestra en la vista -->
    public function consultar(Request $request) {
        if(Session::get('sesionidu')) {
            // Obtén las fechas de inicio y fin del request
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFin = $request->input('fecha_fin');

            // Base de la consulta
            $ventas = \DB::table('ventas')
                ->where('tipo', 'Domicilio') // Filtrando por tipo 'Domicilio'
                ->select('id_venta', 'fecha_venta', 'total_venta', 'nombre_cliente', 'direccion_envio', 'costo_envio', 'hora_salida', 'estado') // Seleccionando las columnas
                ->orderBy('fecha_venta', 'desc'); // Ordenando por fecha_venta en orden descendente

            // Aplica el filtro de fecha solo si ambas fechas están presentes
            if ($fechaInicio && $fechaFin) {
                // Verifica que las fechas están en el formato correcto antes de hacer la consulta
                $ventas->whereBetween('fecha_venta', [$fechaInicio, $fechaFin]);
            }

            // Ejecuta la consulta y obtiene los resultados
            $ventas = $ventas->get();

            // Devuelve la vista con los resultados
            return view('administracion.consultarpedidos')->with('ventas', $ventas);
        }
        else {
            Session::flash('mensaje', "Es necesario iniciar sesion");
            return redirect()->route('login');   
        }
    }

    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción: Función que permite mostrar un registro de los pedidos a domicilio -->
    public function entregar() {
        if(Session::get('sesionidu')) {
            $ventas = \DB::table('ventas')
                ->where('tipo', 'Domicilio') // Filtrando por tipo 'Domicilio'
                ->select('id_venta', 'fecha_venta', 'total_venta', 'nombre_cliente', 'direccion_envio', 'costo_envio', 'hora_salida', 'estado') // Seleccionando las columnas
                ->orderBy('fecha_venta', 'desc'); // Ordenando por fecha_venta en orden descendente

            $ventas = $ventas->get();
            return view('administracion.entregarpedidos')->with('ventas', $ventas);
        }
        else {
            Session::flash('mensaje', "Es necesario iniciar sesion");
            return redirect()->route('login');   
        }
    }

    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción:Función que extrae los datos del pedido a modificar desde la base de datos  -->
    public function completarPedido($id_venta) {
        // Consulta la venta especificada por idventa
        $infoPedido = \DB::select("SELECT id_venta, fecha_venta, nombre_cliente, costo_envio, hora_salida, estado
            FROM ventas
            WHERE id_venta = $id_venta");
        
        return view('administracion.completarpedido')
        ->with('infoPedido', $infoPedido[0]);
    }

    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción: Función que inserta valores para el pedido a domicilio seleccionado
    // desde un formulario en la vista -->
    public function guardarPedido(Request $request) {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'costo_envio' => [
                'required',
                'numeric', 
            ],
            'hora_salida' => [
                'required',
                'regex:/^([01]?[0-9]|2[0-3]):([0-5]?[0-9]):([0-5]?[0-9])$/',  // HH:MM:SS
            ],
            'estado' => [
                'required',
                'regex:/^(Enviado|Completado|Cancelado)$/', 
            ],
        ]);

        // Obtén los datos del formulario
        $id_venta = $request->input('id_venta');
        $costo_envio = $request->input('costo_envio');
        $hora_salida = $request->input('hora_salida');
        $estado = $request->input('estado');

        // Actualiza la venta en la base de datos
        $venta = \DB::table('ventas')
            ->where('id_venta', $id_venta)
            ->update([
                'costo_envio' => $costo_envio,
                'hora_salida' => $hora_salida,
                'estado' => $estado,
            ]);

        return redirect()->route('entregar');
    }
}