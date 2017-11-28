<section class="content" >

 <div class="col-md-12">

  <div class="box box-primary  box-gris">

    <div class="box-header with-border my-box-header">
      <h3 class="box-title"><strong>Ventas</strong></h3>
    </div><!-- /.box-header -->

    <hr style="border-color:white;" />

    <div class="box-body">

      <form   action="{{ url('agregar_venta') }}"  method="post" id="f_agregar_compra" class="formentrada" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}"> 

        <div class="col-md-6">
          <div class="box-body">
            <h4>Cliente</h4>

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
            </div>
            <br>
            <h4>Cantidad</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
              <input type="number" class="form-control" min="1" step="1">
              <span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>
            </div>

            <br>

          </div>
        </div>

        <div class="col-md-6">
          <div class="box-body">
            <h4>Email</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
            </div>

            <br>

            <h4>Precio Unitario</h4>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input type="number" class="form-control">
              <span class="input-group-addon"><i class="fa fa-money"></i></span>
            </div>
            <br>
            <h4>Precio Total</h4>

            <div class="input-group">
              <div class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button">Calcular</button>
              </div><!-- /btn-group -->
              <input type="text" class="form-control">
            </div><!-- /input-group -->

          </div>
        </div>

        

        <div class="box-footer col-xs-12 box-gris ">
          <button type="submit" class="btn btn-primary">Vender</button>
        </div>


      </form>

    </div>

  </div>

</div>
</section>

