<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Insumo;
use App\User;
use App\Compra;
use App\Venta;
use Datatables;



class ComprasController extends Controller
{
    public function form_agregar_compra(){
	    //carga el formulario para agregar un nuevo usuario
    	$insumos=Insumo::all();
    	return view("formularios.form_agregar_compra")->with("insumos",$insumos);
	}

	public function agregar_compra(Request $request){

		$elementos = 0;//insumos a incorporar
		$mycont = 0;
	    $insumo = new Insumo;

	    for ($i=1; $i < 7; $i++) { 
	    	if($request->input($i)>0){
	    		$elementos++;
	    	}
	    }


	    for ($i=1; $i < 7; $i++) { 

	    	if($request->input($i)>0){
	    		$compra = new Compra;
				$new_insumo=Insumo::find($i);//Registro del insumo por id
			    $precio=$new_insumo->precio;
			    $cant_actual=$new_insumo->cantidad;
			   	$compra->id_cliente=$request->input("id_usuario");
			    $compra->id_insumos=$i;
			    $compra->cantidad=$request->input($i);
			    $compra->precio=$precio*$request->input($i);

			    if( $compra->save()){


			    	$new_insumo->cantidad=$request->input($i)+$cant_actual;

			    	if($new_insumo->save()){
						$mycont++;
			    	}
			    	else
			    	{
			    		return view("mensajes.mensaje_error")->with("msj","Hubo un error, intentalo nuevamente");
			    	}
			    }
			    else
			    {
					return view("mensajes.mensaje_error")->with("msj","Hubo un error al agregar, intentalo nuevamente");
			    }
	    	}
	    }

	    if($elementos==$mycont){
	    	if($elementos>0){
				return view("mensajes.msj_agregado_insumo")->with("msj","Articulos agregados correctamente");
	    	}
	    	else{
	    		return view("mensajes.mensaje_error")->with("msj","Para agregar algun articulo al menos uno debe ser mayor a Cero");
	    	}
	    }
    	else
    	{
    		return view("mensajes.mensaje_error")->with("msj","Hubo un error al agregar, intentalo nuevamente");
    	}

	}

	public function listado_compras(){
        
        $insumos_alerta = Insumo::all();
        $tarea_ventas = Venta::all();

        $tareas = 0;
        $cant_agotados = 0;
        foreach ($insumos_alerta as $insumo) {
            if($insumo->cantidad <= 2){
                $cant_agotados++;
            }
        }

        foreach ($tarea_ventas as $venta) {
            if($venta->detalle == 'Pedido' || $venta->detalle =='Reserva'){
                $tareas++;
            }
        }
		return view('listados.listado_compras')
                ->with('insumos_alerta', $insumos_alerta)
                ->with('cant_agotados', $cant_agotados)
                ->with('tarea_ventas', $tarea_ventas)
                ->with('tareas', $tareas);
	}

	public function data_compras(){

		// return Datatables::of( Compra::get()   )->make(true);
		return Datatables::of( Compra::join('role_user', 'compras.id_cliente', '=', 'role_user.user_id')
									 ->join('users', 'users.id', '=', 'role_user.user_id')
									 ->join('insumos', 'insumos.id', '=', 'compras.id_insumos')
									 // ->where('role_user.role_id','=',2)
									 ->select('compras.id', 'users.name','insumos.detalle','compras.cantidad', 'compras.precio', 'compras.created_at')->get())
									 ->make(true);

		// $compras = Compra::all();
		// return Datatables::queryBuilder(DB::table('compras'))->make(true);
	}

}
