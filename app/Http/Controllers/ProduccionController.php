<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduccionController extends Controller
{
	public function form_nueva_produccion(){
		return view("formularios.form_nueva_produccion");
	}

	public function nueva_produccion(Request $request){
		$a = $request->input('a');
		$b = $request->input('b');
		$c = $request->input('c');
		$d = $request->input('d');
		$e = $request->input('e');
		$f = $request->input('f');

		// Reduciendo el numero a dos decimales
		if($a>=0){$a = bcdiv($a, '1', 2);}
		if($b>=0){$b = bcdiv($b, '1', 2);}
		if($c>=0){$c = bcdiv($c, '1', 2);}
		if($d>=0){$d = bcdiv($d, '1', 2);}
		if($e>=0){$e = bcdiv($e, '1', 2);}
		if($f>=0){$f = bcdiv($f, '1', 2);}

		$opcion = $a."+".$b."+".$c."+".$d."+".$e."+".$f;


		switch($opcion)
		{
			case '0.00+1.00+0.00+0.00+2.00+0.00'://1ra Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.05+0.90+0.05+0.05+1.90+0.05'://2da Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.10+0.80+0.10+0.10+1.80+0.10'://3ra Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.15+0.70+0.15+0.15+1.70+0.15'://4ta Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.20+0.60+0.20+0.20+1.60+0.20'://5ta Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.25+0.50+0.25+0.25+1.50+0.25'://6ta Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.30+0.40+0.30+0.30+1.40+0.30'://7ma Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.35+0.30+0.35+0.35+1.30+0.35'://8va Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.40+0.20+0.40+0.40+1.20+0.40'://9na Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.45+0.10+0.45+0.45+1.10+0.45'://10ma Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.50+0.00+0.50+0.50+1.00+0.50'://11ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.00+0.80+0.20+0.55+0.90+0.55'://12ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.20+0.80+0.00+0.60+0.80+0.60'://13ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.00+0.75+0.25+0.65+0.70+0.65'://14ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.25+0.75+0.00+0.70+0.60+0.70'://15ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.00+0.70+0.30+0.75+0.50+0.75'://16ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.30+0.70+0.00+0.80+0.40+0.80'://17ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.00+0.65+0.35+0.85+0.30+0.85'://18ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.35+0.65+0.00+0.90+0.20+0.90'://19ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.00+0.60+0.40+0.95+0.10+0.95'://20ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.40+0.60+0.00+1.00+0.00+1.00'://21ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;
			case '0.50+0.00+0.50+1.00+0.00+1.00'://22ava Condicion
				return view("mensajes.msj_agregado_producto")->with("msj",$opcion);
				break;

			default: 
				return view("mensajes.mensaje_no_producido")->with("msj",$opcion);
				break;
		}

	}
}
