<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use App\Venta;
use App\Producto;
use App\User;
use App\Insumo;
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

    $unidades = $request->input('cantidad');
    $precio = 35 * $unidades;
    $pagado = $request->input('pagado');
    $saldo = $precio - $pagado;
    $tipo = $request->input('tipo_venta');
    $date = date_create($request->input('fecha'));

    $venta->id_cliente = $request->input('id_usuario');
    $venta->idproductos = 1;
    $venta->unidades = $unidades;
    $venta->precio = $precio;
    $venta->pagado = $pagado;
    $venta->saldo = $saldo;
    

    if($tipo == 2 & $this->verifica_pago($precio, $pagado, $saldo, $tipo)){
        $detalle = "Pedido";
    }
    elseif($tipo == 1 & $this->verifica_pago($precio, $pagado, $saldo, $tipo)){
        $detalle = "Reserva";
    }
    elseif($tipo == 3 & $this->verifica_pago($precio, $pagado, $saldo, $tipo)){
        if($producto->unidades >= $unidades){
          $detalle = "Venta";
        }
        else{
          $tipo = 1;
          $detalle = "Reserva";
        }
    }
    else{
      return view("mensajes.mensaje_error")->with("msj","Verifique el metodo de pago");
    }

    $venta->tipo = $tipo;
    $venta->detalle = $detalle;
    $venta->fecha_entrega = date_format($date, 'Y-m-d H:i:s');

    if($venta->save()){
      if($tipo == 3 & $producto->unidades >= $unidades){
          $producto->unidades = $producto->unidades - $unidades;
           if($producto->save()){
              return view("mensajes.msj_venta_producto")->with("msj","Inventario actualizado correctamente como ".$detalle);
          }else{
              return view("mensajes.mensaje_error")->with("msj","Hubo un error, intentalo nuevamente");
          }
      }
      else{
        return view("mensajes.msj_venta_producto")->with("msj","Inventario actualizado correctamente como ".$detalle);
      }
    }
    else{
      return view("mensajes.mensaje_error")->with("msj","Hubo un error, intentalo nuevamente");
    }

  }

  public function listado_ventas(){
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
    return view('listados.listado_ventas')
                ->with('insumos_alerta', $insumos_alerta)
                ->with('cant_agotados', $cant_agotados)
                ->with('tarea_ventas', $tarea_ventas)
                ->with('tareas', $tareas);
  }

  public function data_ventas(){
    return Datatables::of( Venta::join('role_user', 'ventas.id_cliente', '=', 'role_user.user_id')
                   ->join('users', 'users.id', '=', 'role_user.user_id')
                   // ->where('role_user.role_id','=',2)
                   ->select('ventas.id', 'users.name','ventas.unidades', 'ventas.precio','ventas.pagado', 
                    'ventas.saldo','ventas.tipo', 'ventas.detalle', 'ventas.fecha_entrega')->get())
                   ->make(true);
  }

  public function form_editar_venta($id){
    $usuarios = User::all();
    $venta = Venta::find($id);
    return view('formularios.form_editar_venta')->with('venta', $venta)->with('usuarios', $usuarios);
  }

  public function editar_venta(Request $request){

    $producto = Producto::find(1);
    $venta = Venta::find($request->input('id'));
    $unidades = $request->input('cantidad');
    $precio = 35 * $unidades;
    $pagado = $request->input('pagado');
    $saldo = $precio - $pagado;
    $tipo = $request->input('tipo_venta');
    $date = date_create($request->input('fecha'));

    $venta->unidades = $unidades;
    $venta->precio = $precio;
    $venta->pagado = $pagado;
    $venta->saldo = $saldo;
    

    if($tipo == 2 & $this->verifica_pago($precio, $pagado, $saldo, $tipo)){
        $detalle = "Pedido";
    }
    elseif($tipo == 1 & $this->verifica_pago($precio, $pagado, $saldo, $tipo)){
        $detalle = "Reserva";
    }
    elseif($tipo == 3 & $this->verifica_pago($precio, $pagado, $saldo, $tipo)){
        if($producto->unidades >= $unidades){
          $detalle = "Venta";
        }
        else{
          $tipo = 1;
          $detalle = "Reserva";
        }
    }
    else{
      return view("mensajes.mensaje_error")->with("msj","Verifique el metodo de pago");
    }
    $venta->tipo = $tipo;
    $venta->detalle = $detalle;
    $venta->fecha_entrega = date_format($date, 'Y-m-d H:i:s');

    if($venta->save()){
      if($tipo == 3 & $producto->unidades >= $unidades){
          $producto->unidades = $producto->unidades - $unidades;
           if($producto->save()){
              return view("mensajes.msj_venta_producto")->with("msj","Inventario actualizado correctamente como ".$detalle);
          }else{
              return view("mensajes.mensaje_error")->with("msj","Hubo un error, intentalo nuevamente");
          }
      }
      else{
        return view("mensajes.msj_venta_producto")->with("msj","Inventario actualizado correctamente como ".$detalle);
      }
    }
    else{
      return view("mensajes.mensaje_error")->with("msj","Hubo un error, intentalo nuevamente");
    }


  }

  public function verifica_pago($precio, $pagado, $saldo, $tipo){

    if($tipo == 2 & $pagado == 0 & $saldo == $precio){
      return true;
    }
    elseif($tipo == 1 & $pagado > 0 & $pagado <=$precio & ($pagado + $saldo) == $precio){
      return true;
    }
    elseif($tipo == 3 & $precio == $pagado & $saldo == 0){
      return true;
    }
    else{
      return false;
    }

  }

}
