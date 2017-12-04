@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')

<div class="callout callout-default">
    <div class="input-group">
        <h4>Reporte de ventas</h4>
              <span class="input-group-btn">
        <button href="javascript:void(0);" onclick="refresh()" class="btn btn-info btn-flat" type="button"><i class="fa fa-refresh"></i></button>
      </span>
    </div>
</div>  
<section  id="contenido_principal">

<div class="box box-primary">
        <div id='table_responsive' style='min-height: 400px;' >
           <table class="table table-bordered table-striped" id="tabla-ventas" style='width: 100% !important;'>
                <thead>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Unidades</th>
                        <th>Costo</th>
                        <th>Pagado</th>
                        <th>Saldo</th>
                        <th>Tipo</th>
                        <th>Detalle</th>
                        <th>Fecha Entrega</th>
                        
                        <th>accion</th>
                </thead>
            </table>
         </div>   
    
</div>  


</section>

@section('scripts')



@parent

<script>
 function activar_tabla_ventas() {
    $('#tabla-ventas').DataTable({
        order: [[ 6, 'asc' ]],
        processing: true,
        serverSide: true,
        pageLength: 10,
        language: {
                 "url": '{!! asset('/plugins/datatables/latino.json') !!}'
                  } ,
        ajax: '{!! url('listado_ventas_data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'unidades', name: 'unidades' },
            { data: 'precio', name: 'precio' },
            { data: 'pagado', name: 'pagado' },
            { data: 'saldo', name: 'saldo' },
            { data: 'tipo', name: 'tipo' },
            { data: 'detalle', name: 'detalle' },
            { data: 'fecha_entrega', name: 'fecha_entrega' },
            
            
            { data: null,  render: function ( data, type, row ) {
                
            if(data.detalle=='Reserva')
                return "<a href='javascript:void(0);' onclick='verinfo_venta("+ data.id +")'><i class='fa fa-circle-o text-red'></i></a>" 


            else if(data.detalle=='Pedido')
                return "<a href='javascript:void(0);' onclick='verinfo_venta("+ data.id +")'><i class='fa fa-circle-o text-yellow'></i></a>" 
            else
                return "<i class='fa fa-circle-o text-green'></i></a>" 
            }  
            }
            
        ]
    });
}
activar_tabla_ventas();

function refresh()
{
    location.reload(true);
}

</script>



@endsection


@endsection