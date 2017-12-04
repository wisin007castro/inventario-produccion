  
  <section class="content">

 <div class="col-md-12">

  <div class="box box-primary  box-gris">

    <div class="box-header with-border my-box-header">
      <h3 class="box-title"><strong> Editar Venta </strong></h3>
    </div><!-- /.box-header -->

    <hr style="border-color:white;" />

    <div class="box-body">
      <form   action="{{ url('editar_venta') }}"  method="post" id="f_editar_venta" class="formentrada" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <input type="hidden" class="form-control" name="id" value="{{$venta->id}}">
        <!-- <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">  -->

        <div class="col-md-6">
          <div class="box-body">

            <h4>No. Venta</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                <input type="number" class="form-control" value="{{$venta->id}}" disabled>
              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
            </div>
            <br>
            <div class="col-md-6">
              <h4>Cantidad</h4>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                  <input type="number" class="form-control" min="1" step="1" id="cantidad" name="cantidad" value="{{$venta->unidades}}">
                <span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>
              </div>
            </div>
            <div class="col-md-6">
              <h4>Total a pagar</h4>
              <div class="input-group">
                <span class="input-group-addon">Bs.</span>
                <input type="text" class="form-control" id="precio" name="precio" value="{{$venta->precio}}" disabled>
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
              </div>
            </div>
            <br><br>
            <div class="col-md-12">
              <h4>Tipo de venta</h4>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                <select class="form-control" id="tipo_venta" name="tipo_venta">
                  @if($venta->tipo == 1)
                <option value="1" selected>Reserva</option><!-- Reserva 1 -->
                <option value="2">Pedido</option><!-- Pedido 2 -->
                <option value="3">Venta</option><!-- Venta 3 -->
                  @elseif($venta->tipo == 2)
                <option value="1">Reserva</option><!-- Reserva 1 -->
                <option value="2" selected>Pedido</option><!-- Pedido 2 -->
                <option value="3">Venta</option><!-- Venta 3 -->
                  @else
                <option value="1">Reserva</option><!-- Reserva 1 -->
                <option value="2">Pedido</option><!-- Pedido 2 -->
                <option value="3" selected>Venta</option><!-- Venta 3 -->
                  @endif
              </select>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="box-body">
            <h4>Cliente</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select class="form-control" name="id_usuario" >
                @foreach($usuarios as $usuario)
                
                @if($usuario->id == $venta->id_cliente)
                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endif
                
                @endforeach
              </select>
            </div>
            <br>
            <div class="col-md-6">
              <h4>Pagado</h4>
              <div class="input-group">
                <span class="input-group-addon">Bs.</span>
                <input type="number" class="form-control" min="0" step="0.1" id="pagado" name="pagado" value="{{$venta->pagado}}">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
              </div>
            </div>
            <div class="col-md-6">

              <h4>Saldo</h4>
              <div class="input-group">
                <span class="input-group-addon">Bs.</span>
                <input type="number" class="form-control" min="0" step="0.1" id="saldo" name="saldo" value="{{$venta->saldo}}" disabled>
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
              </div>
            </div>
            <br>
            <br>
            <div class="col-md-12">
              <h4>Fecha de entrega</h4>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
                <input type="date" class="form-control" id="fecha" name="fecha" step="1" min="<?php echo date("Y-m-d");?>" max="2023-02-23" value="<?php echo date("Y-m-d");?>" required>
              </div>
            </div>

          </div>
        </div>

        <div class="box-footer col-xs-12 box-gris ">     
          <div class="margin" style="text-align:center;">         
            <div class="btn-group">
              <button type="submit" class="btn btn-primary">Vender</button>
            </div>
          </div>
        </div>


      </form>

    </div>

  </div>

</div>

</section>
</div>

</div><!-- ./wrapper -->


<script>

    var cantidad = document.getElementById('cantidad');
    var precio = document.getElementById('precio');

    var pagado = document.getElementById('pagado');
    var saldo = document.getElementById('saldo');

    var tipo_venta = document.getElementById('tipo_venta');
    var fecha = document.getElementById('fecha');
    

    cantidad.addEventListener('click',function(evento){
    if(cantidad.checked){
        precio.value='35'
        // txtpeso.value='3'
    }else{
        precio.value=cantidad.value*35
        saldo.value=(cantidad.value*35) - pagado.value
    }
    },false);

    pagado.addEventListener('click',function(evento){
    if(pagado.checked){
        saldo.value='35'
        // txtpeso.value='3'
    }else{
        saldo.value=(cantidad.value*35)-pagado.value
        // txtpeso.value=uni.value*3
    }
    },false);


    tipo_venta.addEventListener('click',function(evento){
    if(tipo_venta.value == '1'){
        // fecha.value=fecha_act
    }else{
        // fecha.value= '01/01/2018'
        precio.value=cantidad.value*35
        saldo.value=(cantidad.value*35) - pagado.value
        // txtpeso.value=uni.value*3
    }
    },false);


</script>
