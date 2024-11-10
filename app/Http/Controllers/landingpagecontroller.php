<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingpagecontroller extends controller {


    public function inicio() {
        return view ('landingpage.index');
    }

}