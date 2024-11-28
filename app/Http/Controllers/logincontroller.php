<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleados;

use Session;

class logincontroller extends Controller {
    
    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción: Función que muestra la página principal del sistema si se encuentra una sesión. -->
    public function inicio() {
        if(Session::get('sesionidu'))
        {
        return view ('administracion.home');
        }
        else{
            Session::flash('mensaje', "Es necesario iniciar sesion");
            return redirect()->route('login');   
        }
    }

    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción: Función que muestra la vista del login. -->
    public function login() {
        return view ('login');
    }
    
    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción: Función que valida las credenciales de acceso de sesiones. -->
    public function validar(Request $request) { 
        $nombre_usuario = $request->nombre_usuario;
        $contrasena = $request->contrasena;
        
        $acceso = empleados::where('nombre_usuario', '=', $nombre_usuario)
                   ->where('estado', '=', 'Activo')
                   ->get();

        if (count($acceso) > 0) {
            if ($acceso[0]->contrasena == $contrasena) {
                // La contraseña es correcta
                Session::put('sesionname', $acceso[0]->nombre_empleado . ' ' . $acceso[0]->apellido_pat . ' ' . $acceso[0]->apellido_mat);
                Session::put('sesionidu', $acceso[0]->id_empleado);
                Session::put('sesiontipo', $acceso[0]->id_role);
                return redirect()->route('inicio');
            } else {
                // La contraseña no coincide
                Session::flash('mensaje', "La contraseña no coincide");
                return redirect()->route('login');
            }
        } else {
            // No se encontró el usuario con el estado 'Activo'
            Session::flash('mensaje', "No se encontró el usuario con el estado 'Activo'");
            return redirect()->route('login');
        }

       
    }

    // <!-- Autor: Jose Bladimir Cielo Cuautle
    // Fecha: Noviembre 27, 2024
    // Descripción: Función que cierra la sesión activa. -->
    public function cerrarsesion() {
       Session::forget('sesionname');
       Session::forget('sesionidu');
       Session::forget('sesiontipo');
       Session::flush();
       Session::flash('mensaje', 'Session Cerrada Correctamente');
       return redirect()->route('login');
    }
}
