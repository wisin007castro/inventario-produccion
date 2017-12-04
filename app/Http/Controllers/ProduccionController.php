<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Insumo;
use App\Venta;

class ProduccionController extends Controller
{

	private $req;
	// $req[0] = array('0' => '0.00', '1' => '1.00', '2' => '0.00', '3' => '0.00', '4' => '2.00', '5' => '0.00');


	public function __construct(){
		
		$this->req[0] = array('0' => '0.00', '1' => '1.00', '2' => '0.00', '3' => '0.00', '4' => '2.00', '5' => '0.00');
		$this->req[1] = array('0' => '0.05', '1' => '0.90', '2' => '0.05', '3' => '0.05', '4' => '1.90', '5' => '0.05');
		$this->req[2] = array('0' => '0.10', '1' => '0.80', '2' => '0.10', '3' => '0.10', '4' => '1.80', '5' => '0.10');
		$this->req[3] = array('0' => '0.15', '1' => '0.70', '2' => '0.15', '3' => '0.15', '4' => '1.70', '5' => '0.15');
		$this->req[4] = array('0' => '0.20', '1' => '0.60', '2' => '0.20', '3' => '0.20', '4' => '1.60', '5' => '0.20');
		$this->req[5] = array('0' => '0.25', '1' => '0.50', '2' => '0.25', '3' => '0.25', '4' => '1.50', '5' => '0.25');
		$this->req[6] = array('0' => '0.30', '1' => '0.40', '2' => '0.30', '3' => '0.30', '4' => '1.40', '5' => '0.30');
		$this->req[7] = array('0' => '0.35', '1' => '0.30', '2' => '0.35', '3' => '0.35', '4' => '1.30', '5' => '0.35');
		$this->req[8] = array('0' => '0.40', '1' => '0.20', '2' => '0.40', '3' => '0.40', '4' => '1.20', '5' => '0.40');
		$this->req[9] = array('0' => '0.45', '1' => '0.10', '2' => '0.45', '3' => '0.45', '4' => '1.10', '5' => '0.45');
		$this->req[10] = array('0' => '0.50', '1' => '0.00', '2' => '0.50', '3' => '0.50', '4' => '1.00', '5' => '0.50');
		$this->req[11] = array('0' => '0.00', '1' => '0.80', '2' => '0.20', '3' => '0.55', '4' => '0.90', '5' => '0.55');
		$this->req[12] = array('0' => '0.20', '1' => '0.80', '2' => '0.00', '3' => '0.60', '4' => '0.80', '5' => '0.60');
		$this->req[13] = array('0' => '0.00', '1' => '0.75', '2' => '0.25', '3' => '0.65', '4' => '0.70', '5' => '0.65');
		$this->req[14] = array('0' => '0.25', '1' => '0.75', '2' => '0.00', '3' => '0.70', '4' => '0.60', '5' => '0.70');
		$this->req[15] = array('0' => '0.00', '1' => '0.70', '2' => '0.30', '3' => '0.75', '4' => '0.50', '5' => '0.75');
		$this->req[16] = array('0' => '0.30', '1' => '0.70', '2' => '0.00', '3' => '0.80', '4' => '0.40', '5' => '0.80');
		$this->req[17] = array('0' => '0.00', '1' => '0.65', '2' => '0.35', '3' => '0.85', '4' => '0.30', '5' => '0.85');
		$this->req[18] = array('0' => '0.35', '1' => '0.65', '2' => '0.00', '3' => '0.90', '4' => '0.20', '5' => '0.90');
		$this->req[19] = array('0' => '0.00', '1' => '0.60', '2' => '0.40', '3' => '0.95', '4' => '0.10', '5' => '0.95');
		$this->req[20] = array('0' => '0.40', '1' => '0.60', '2' => '0.00', '3' => '1.00', '4' => '0.00', '5' => '1.00');
		$this->req[21] = array('0' => '0.50', '1' => '0.00', '2' => '0.50', '3' => '1.00', '4' => '0.00', '5' => '1.00');
	}

	public function form_nueva_produccion(){
		return view("formularios.form_nueva_produccion");
	}

	public function form_reporte_inventario(){

		$ventas = Venta::all();
		$producto = Producto::find(1);
		$insumos = Insumo::all();

		$costo_insumos = 0;
		$total_insumos = 0;
		foreach ($insumos as $insumo) {
			$costo_insumos = $costo_insumos + ($insumo->cantidad * $insumo->precio);
			$total_insumos = $total_insumos + $insumo->cantidad;
		}
		$costo_insumos = round($costo_insumos, 2);

		$total_ventas = 0;
		foreach ($ventas as $venta) {
			if($venta->detalle == 'Venta'){
				$total_ventas = $total_ventas + $venta->precio;
			}
		}
		$total_ventas = round($total_ventas, 2);
		return view("formularios.form_reporte_inventario")
					->with('insumos', $insumos)
					->with('producto', $producto)
					->with('costo_insumos', $costo_insumos)
					->with('total_insumos', $total_insumos)
					->with('total_ventas', $total_ventas);
	}

	public function nueva_produccion(Request $request){

		$unidades =  $request->input('unidades');

		$cont = 0;

		for ($i=0; $i < 22; $i++) {
			if($this->verificar($i, $unidades)){
				$cont = 1;
				if($this->agregar_producto($i, $unidades)){
					return view("mensajes.msj_agregado_producto")->with("msj","Es posible la producción de ".$unidades. " unidad(es)");
				}
				else{
					return view("mensajes.mensaje_error")->with("msj","Hubo un error al agregar el producto");
				}
			}
		}
		if($cont ==0){
			return view("mensajes.mensaje_no_producido")->with("msj","Agregue insumos o pruebe de nuevo");
		}
	}

	public function agregar_producto($indice, $unidades){

		$producto = Producto::find(1);//solo existe un producto en el registro
		$unidades_act = $producto->unidades;
		$producto->unidades = $unidades_act+$unidades;

		if($producto->save()){
			$mycont = 0;
			for($i=1; $i < 7; $i++){
				$new_insumo=Insumo::find($i);//Registro del insumo por id
				$cant_actual=$new_insumo->cantidad;
				$new_insumo->cantidad=$cant_actual-($this->req[$indice][$i-1]*$unidades);
				if($new_insumo->save()){
					$mycont++;
				}
				else
				{
					return false;
				}
			}
			if($mycont==6){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}

	}


	public function verificar($indice, $unidades){

		$insumo = Insumo::all();
		foreach ($insumo as $ins) {
				$existencias[] = $ins->cantidad;//cantidad de insumos en inventario
			}
			$contador=0;
			for ($j=0; $j < count($existencias) ; $j++) {
				
				if($existencias[$j] < ($this->req[$indice][$j]*$unidades)){
					$contador++;
				}
			}
			if($contador>0){
				return false;
			}
			else{
				return true;
			}

			
	}

		public function factibilidad(){
			
		// $insumo = Insumo::all();
		// foreach ($insumo as $ins) {
		// 		$existencias[] = $ins->cantidad;//cantidad de insumos en inventario
		// }

		// $cont_total=0;
		// for ($i=0; $i <count($this->req) ; $i++) {
		// 	$contador=0;
		// 	for ($j=0; $j < count($existencias) ; $j++) {
		// 		if($existencias[$j] < $this->req[$i][$j]){
		// 			$contador++;
		// 		}
		// 	}
		// 	if($contador>0){
		// 		$cont_total++;
		// 	}
		// }
		// if($cont_total>0){
		// 	echo "No posible, solo ".(string)(22-$cont_total)." combinacion(es) posible(s)";
		// }
		// else{
		// 	echo "Posible ".(string)(22-$cont_total)." combinaciones";
		// }

		}
	}
