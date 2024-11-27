<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ventas;

use Session;

class pedidoscontroller extends controller {

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

    public function entregaPedido($id_venta) {
        // Consulta la venta especificada por idventa
        $infoPedido = \DB::select("SELECT id_venta, fecha_venta, nombre_cliente, hora_salida, estado
            FROM ventas
            WHERE id_venta = $id_venta");
        
        return view('administracion.entregapedido')
        ->with('infoPedido', $infoPedido[0]);
    }

    public function guardarPedido(Request $request) {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'hora_salida' => [
                'required',
                'regex:/^([01]?[0-9]|2[0-3]):([0-5]?[0-9]):([0-5]?[0-9])$/',  // HH:MM:SS
            ],
            'estado' => [
                'required',
                'regex:/^(Enviado|Completado|Cancelado)$/',  // Solo "Completado" o "Cancelado"
            ],
        ]);

        // Obtén los datos del formulario
        $id_venta = $request->input('id_venta');
        $hora_salida = $request->input('hora_salida');
        $estado = $request->input('estado');

        // Actualiza la venta en la base de datos
        $venta = \DB::table('ventas')
            ->where('id_venta', $id_venta)
            ->update([
                'hora_salida' => $hora_salida,
                'estado' => $estado,
            ]);

        Session::flash('mensaje', "El pedido $request->id_venta se ha guardado correctamente.");
        return redirect()->route('entregar');
    }
}