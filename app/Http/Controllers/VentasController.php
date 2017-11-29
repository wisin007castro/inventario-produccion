<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Producto;

class VentasController extends Controller
{
    public function form_agregar_venta(){
    	$venta=Venta::all();
    	if(count($venta)>0){
    		$codigo=1+$venta->last()->id;
    	}
    	else{
    		$codigo=1;
    	}
    	return view('formularios.form_agregar_venta')->with("codigo", $codigo);
    }

    public function agregar_venta(Request $request){
    	
    	$venta = new Venta;
    	$producto = Producto::find(1);
		
		$unidades_act = $producto->unidades;
    	$tipo = 0;//0=pedido, 1=compra
    	$detalle;
    	if($producto->unidades < $request->input('cantidad')){
    	$tipo = 0;//pedido
    	$detalle = "Pedido";
  
    	}
    	else{
		$tipo = 1;//Venta
    	$detalle ="Venta";

    	}

    	$venta->id_cliente = $request->input('id_usuario');
    	$venta->idproductos = 1;
    	$venta->tipo = $tipo;
    	$venta->unidades = $request->input('cantidad');
    	$venta->precio = 35 * $request->input('cantidad');
    	$venta->detalle = $detalle;

    	if($venta->save()){
    		if($tipo == 1){
    			$producto->unidades = $unidades_act - $request->input('cantidad');
    			if($producto->save()){
    				return view("mensajes.msj_venta_producto")->with("msj","Inventario actualizado correctamente como ".$detalle);
    			}else{
    				return view("mensajes.mensaje_error")->with("msj","Hubo un error, intentalo nuevamente");
    			}

    		}
    		else{
    			return view("mensajes.msj_pedido_producto")->with("msj","Inventario actualizado correctamente como ".$detalle);
    		}
    	}
    	else{
    		return view("mensajes.mensaje_error")->with("msj","Hubo un error, intentalo nuevamente");
    	}

    }
}
