<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ventas;

use Session;

class pedidoscontroller extends controller {

    public function consultar(Request $request) {
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
return view('administracion.pedidos')->with('ventas', $ventas);

    }
}