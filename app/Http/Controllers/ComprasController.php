<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Insumo;
use App\User;
use App\Compra;



class ComprasController extends Controller
{
    public function form_agregar_compra(){
	    //carga el formulario para agregar un nuevo usuario
    	$insumos=Insumo::all();
    	return view("formularios.form_agregar_compra")->with("insumos",$insumos);
	}

	public function agregar_compra(Request $request){
	    $compra = new Compra;
	    $insumo = new Insumo;
	    $new_insumo=Insumo::find($request->input("art"));
	    $cant_actual=$new_insumo->cantidad;

	    $compra->id_cliente=$request->input("id_usuario");
	    $compra->id_insumos=$request->input("art");
	    $compra->cantidad=$request->input("cant");
	    $compra->precio=$request->input("precio");

	    if( $compra->save()){
	    	$new_insumo->cantidad=$request->input("cant")+$cant_actual;

	    	if($new_insumo->save()){
				return view("mensajes.msj_agregado_insumo")->with("msj","Articulo agregado correctamente");
	    	}
	    	else
	    	{
	    		return view("mensajes.mensaje_error")->with("msj","Hubo un error al agregar, intentarlo nuevamente");
	    	}
	    }
	    else
	    {
			return view("mensajes.mensaje_error")->with("msj","Hubo un error al agregar, intentarlo nuevamente");
	    }
	}
}
