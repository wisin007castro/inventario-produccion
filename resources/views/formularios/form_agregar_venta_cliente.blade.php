<section class="content" >

 <div class="col-md-12">

  <div class="box box-primary  box-gris">

    <div class="box-header with-border my-box-header">
      <h3 class="box-title"><strong>Ventas Cliente</strong></h3>
    </div><!-- /.box-header -->

    <hr style="border-color:white;" />

    <div class="box-body">
      <form   action="{{ url('agregar_venta') }}"  method="post" id="f_agregar_venta" class="formentrada" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}"> 
        <input type="hidden" name="tipo_venta" value="2"> <!-- pedido -->
        <input type="hidden" name="pagado" value="0"> <!-- pagado -->
        <div class="col-md-6">
          <div class="box-body">

            <h4>No. Venta</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
              <input type="number" class="form-control" value="<?php echo $codigo; ?>" disabled>
              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
            </div>
            <br>
            <div class="col-md-6">
              <h4>Cantidad</h4>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                <input type="number" class="form-control" min="1" step="1" id="cantidad" name="cantidad" value="1">
                <span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>
              </div>
            </div>
            <div class="col-md-6">
              <h4>Total a pagar</h4>
              <div class="input-group">
                <span class="input-group-addon">Bs.</span>
                <input type="text" class="form-control" id="precio" name="precio" value="35" disabled>
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
              </div>
            </div>
            <br><br>
            <div class="col-md-12">
              <h4>Tipo de venta</h4>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                <input type="text" class="form-control" id="" name="" value="Pedido" disabled >
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="box-body">
            <h4>Cliente</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
            </div>
            <br>
            <div class="col-md-6">
              <h4>Pagado</h4>
              <div class="input-group">
                <span class="input-group-addon">Bs.</span>
                <input type="number" class="form-control" min="0" step="0.1" value="0" disabled>
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
              </div>
            </div>
            <div class="col-md-6">

              <h4>Saldo</h4>
              <div class="input-group">
                <span class="input-group-addon">Bs.</span>
                <input type="number" class="form-control" min="0" step="0.1" id="saldo" name="saldo" value="35" disabled>
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

<script>

  var cantidad = document.getElementById('cantidad');
  var precio = document.getElementById('precio');
  var saldo = document.getElementById('saldo');


  cantidad.addEventListener('click',function(evento){
    if(cantidad.checked){
        precio.value='35'
          // txtpeso.value='3'
      }else{
        precio.value=cantidad.value*35
        saldo.value=(cantidad.value*35)
      }
    },false);

    </script>