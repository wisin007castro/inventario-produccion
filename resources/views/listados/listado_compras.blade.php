@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')


<section  id="contenido_principal">

<div class="box box-primary box-gris">
        <div id='table_responsive' style='min-height: 300px;' >
           <table class="table table-bordered table-striped" id="tabla-compras" style='width: 100% !important;'>
                <thead>
                   
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Insumos</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Detalle</th>
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
            { data: 'id_insumos', name: 'id_insumos' },
            { data: 'cantidad', name: 'cantidad' },
            { data: 'precio', name: 'precio' },
            { data: 'detalle', name: 'detalle' },
            { data: 'created_at', name: 'fecha' }
            // ,
            // { data: null,  render: function ( data, type, row ) {
            //     return "<a href='{{ url('form_editar_contacto/') }}/"+ data.id +"' class='btn btn-xs btn-primary' >Editar</button>"  }  
            // }
        ]
    });
}
activar_tabla_compras();

</script>



@endsection


@endsection