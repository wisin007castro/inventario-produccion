<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use App\Venta;
use App\Producto;
use App\User;
use Datatables;

class VentasController extends Controller
{
    public function form_agregar_venta(){
    	$venta=Venta::all();
      $usuarios = User::all();
      if(count($venta)>0){
          $codigo=1+$venta->last()->id;
      }
      else{
          $codigo=1;
      }
      return view('formularios.form_agregar_venta')->with("codigo", $codigo)->with("usuarios", $usuarios);
  }

  public function form_agregar_venta_cliente(){
    $venta=Venta::all();
    $usuarios = User::all();
    if(count($venta)>0){
        $codigo=1+$venta->last()->id;
    }
    else{
        $codigo=1;
    }
    return view('formularios.form_agregar_venta_cliente')->with("codigo", $codigo)->with("usuarios", $usuarios);
}

public function agregar_venta(Request $request){

   $venta = new Venta;
   $producto = Producto::find(1);

   $unidades_act = $producto->unidades;
    	$tipo = 1;//
    	$detalle = "Pedido";
    	if($producto->unidades < $request->input('cantidad')){
    	
        $detalle = "Pedido";
        $venta->precio = 35 * $request->input('cantidad');
        $venta->pagado = 0;
        $venta->saldo = 35 * $request->input('cantidad'); 
    }
    else{
		$tipo = $request->input('tipo_venta');//  | Venta | Reserva | Pedido
        if($tipo == 1){
            $detalle ="Venta";
            $venta->precio = 35 * $request->input('cantidad');
            $venta->pagado = $request->input('pagado');
            $venta->saldo = (35 * $request->input('cantidad')) - $request->input('pagado'); 
        }
        else{
            if($tipo == 2){
                $detalle ="Reserva";
                $venta->precio = 35 * $request->input('cantidad');
                $venta->pagado = $request->input('pagado');
                $venta->saldo = (35 * $request->input('cantidad')) - $request->input('pagado'); 
            }
            else{
                $detalle ="Pedido";
                $tipo = 3;//pedido
                $venta->precio = 35 * $request->input('cantidad');
                $venta->pagado = 0;
                $venta->saldo = 35 * $request->input('cantidad'); 
            }
        }

    }

    $date = date_create($request->input('fecha'));

    $venta->id_cliente = $request->input('id_usuario');
    $venta->idproductos = 1;
    $venta->tipo = $tipo;
    $venta->unidades = $request->input('cantidad');

    $venta->detalle = $detalle;
    $venta->fecha_entrega = date_format($date, 'Y-m-d H:i:s');

    if($venta->save()){
      if($tipo == 3){
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


  public function listado_ventas(){
    return view('listados.listado_ventas');
  }

  public function data_ventas(){

    // return Datatables::of( Compra::get()   )->make(true);
    return Datatables::of( Venta::join('role_user', 'ventas.id_cliente', '=', 'role_user.user_id')
                   ->join('users', 'users.id', '=', 'role_user.user_id')
                   // ->where('role_user.role_id','=',2)
                   ->select('ventas.id', 'users.name','ventas.unidades', 'ventas.precio','ventas.pagado', 
                    'ventas.saldo', 'ventas.detalle', 'ventas.fecha_entrega', 'ventas.created_at')->get())
                   ->make(true);

    // $compras = Compra::all();
    // return Datatables::queryBuilder(DB::table('compras'))->make(true);
  }

}
