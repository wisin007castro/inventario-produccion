<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    public function form_nueva_produccion(){
    	return view("formularios.form_nueva_produccion");
    }
}
