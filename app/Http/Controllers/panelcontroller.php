<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class panelcontroller extends controller {


    public function panelinicio() {
        return view ('administracion.home');
    }

}