<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingpagecontroller extends controller {


    public function landing() {
        return view ('landingpage.index');
    }
    public function pedidos() {
        return view ('landingpage.pedidosdomicilio');
    }

}