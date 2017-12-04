<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Insumo;
use App\Venta;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
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

        return view('home')
                ->with('insumos_alerta', $insumos_alerta)
                ->with('cant_agotados', $cant_agotados)
                ->with('tarea_ventas', $tarea_ventas)
                ->with('tareas', $tareas);
    }
}