<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function form_agregar_venta(){
    	return view('formularios.form_agregar_venta');
    }
}
