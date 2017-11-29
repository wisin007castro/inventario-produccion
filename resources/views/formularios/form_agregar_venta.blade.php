<section class="content" >

 <div class="col-md-12">

  <div class="box box-primary  box-gris">

    <div class="box-header with-border my-box-header">
      <h3 class="box-title"><strong>Ventas</strong></h3>
    </div><!-- /.box-header -->

    <hr style="border-color:white;" />

    <div class="box-body">
      <form   action="{{ url('agregar_venta') }}"  method="post" id="f_agregar_venta" class="formentrada" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}"> 
        <div class="col-md-6">
          <div class="box-body">

            <h4>No. Venta</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
              <input type="number" class="form-control" value="<?php echo $codigo; ?>" disabled>
              <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
            </div>

            <h4>Precio por producto</h4>
            <div class="input-group">
              <span class="input-group-addon">Bs.</span>
              <input type="text" class="form-control" id="precio" name="precio" value="30" disabled>
              <span class="input-group-addon"><i class="fa fa-money"></i></span>
              <!-- <p id="resultado">A+B+C+D = </p> -->
            </div><!-- /input-group -->
            <h4>Cantidad</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
              <input type="number" class="form-control" min="1" step="1" name="cantidad" value="1">
              <span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box-body">
            <h4>Codigo Cliente</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" value="{{ Auth::user()->id }}" disabled>
            </div>
            <h4>Email</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
            </div>
            <h4>Cliente</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
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

