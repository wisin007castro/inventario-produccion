@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')


<section  id="contenido_principal">

<div class="box box-primary box-gris">
        <div id='table_responsive' style='min-height: 700px;' >
           <table class="table table-bordered table-striped" id="tabla-ventas" style='width: 100% !important;'>
                <thead>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Unidades</th>
                        <th>Costo</th>
                        <th>Pagado</th>
                        <th>Saldo</th>
                        <th>Detalle</th>
                        <th>Fecha Entrega</th>
                        <th>Fecha de Registro</th>

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
            { data: 'detalle', name: 'detalle' },
            { data: 'fecha_entrega', name: 'fecha_entrega' },
            { data: 'created_at', name: 'created_at' },
            
            { data: null,  render: function ( data, type, row ) {
                
            if(data.detalle=='Reserva')
                return "<a href='{{ url('form_editar_contacto/') }}/"+ data.id +"'><i class='fa fa-circle-o text-red'></i></a>" 

            else if(data.detalle=='Pedido')
                return "<a href='{{ url('form_editar_contacto/') }}/"+ data.id +"'><i class='fa fa-circle-o text-yellow'></i></a>" 
            else
                return "<i class='fa fa-circle-o text-green'></i></a>" 
            }  
            }
            
        ]
    });
}
activar_tabla_ventas();

</script>



@endsection


@endsection