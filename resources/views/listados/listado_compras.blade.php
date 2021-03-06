@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')

<div class="callout callout-default">
    <div class="input-group">
        <h4>Reporte de Compras</h4>
              <span class="input-group-btn">
        <button href="javascript:void(0);" onclick="refresh()" class="btn btn-info btn-flat" type="button"><i class="fa fa-refresh"></i></button>
      </span>
    </div>
</div> 
<section  id="contenido_principal">

<div class="box box-primary box-gris">
        <div id='table_responsive' style='min-height: 300px;' >
           <table class="table table-bordered table-striped" id="tabla-compras" style='width: 100% !important;'>
                <thead>
                   
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Insumo</th>
                        <th>Cantidad</th>
                        <th>Costo Total</th>
                        <th>Fecha</th>
                        <!-- <th>accion</th> -->
                </thead>
            </table>
         </div>   
    
</div>  


</section>

@section('scripts')



@parent

<script>
 function activar_tabla_compras() {
    $('#tabla-compras').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        language: {
                 "url": '{!! asset('/plugins/datatables/latino.json') !!}'
                  } ,
        ajax: '{!! url('listado_compras_data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'detalle', name: 'detalle' },
            { data: 'cantidad', name: 'cantidad' },
            { data: 'precio', name: 'precio' },
            { data: 'created_at', name: 'fecha' }
            // ,
            // { data: null,  render: function ( data, type, row ) {
            //     return "<a href='{{ url('form_editar_contacto/') }}/"+ data.id +"' class='btn btn-xs btn-primary' >Editar</button>"  }  
            // }
        ]
    });
}
activar_tabla_compras();

function refrescar()
{
    location.reload(true);
}

</script>



@endsection


@endsection