<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\platillos;
use App\Models\apartados;
use App\Models\platillos_apartados;

use Session;

class panelcontroller extends controller {


    public function panelinicio() {
        return view ('administracion.home');
    }

    // PLANEL MENÚ
    public function panelmenu() {
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

        return view('administracion.menu')
        ->with('apartados', $apartados)
        ->with('platillos',$platillos);
    }
    
    // CREAR APARTADO EN MENÚ
    public function crearapartado(Request $request) {
        $this->validate($request, [
            'nombre_ap' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,í,ó,é,ú,ü,ñ,Ñ]+$/',
            'desc' => 'required|regex:/^[0-9,A-Z][A-Z,a-z, ,á,í,ó,é,ú,ü,ñ,Ñ,#,.,0-9,\,]+$/',
        ]);
    
        // Crear apartado
        $apartadoId = \DB::table('apartados')->insertGetId([
            'id_menu' => 1,
            'nombre_apartado' => $request->nombre_ap,
            'descripcion' => $request->desc,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Asignar platillos al apartado
        $platillos = json_decode($request->platillos, true);
        foreach ($platillos as $platillo) {
            \DB::table('platillos_apartados')->insert([
                'id_apartado' => $apartadoId,
                'id_platillo' => $platillo['id'],
            ]);
        }
    
        Session::flash('mensaje', "El apartado $request->nombre_ap se ha guardado correctamente.");
        return redirect()->route('panelmenu');
    }
}