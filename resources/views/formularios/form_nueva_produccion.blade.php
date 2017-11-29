<section class="content" >

  <div class="col-md-12">

    <div class="box box-primary  box-gris">

      <div class="box-header with-border my-box-header">
        <h3 class="box-title"><strong>Nueva Producción</strong></h3>
      </div><!-- /.box-header -->

      <hr style="border-color:white;" />

      <div class="box-body">

        <form   action="{{ url('nueva_produccion') }}"  method="post" id="f_nueva_produccion" class="formentrada" >
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 


          <div class="col-md-4">
            <div class="form-group">
              <label class="col-sm-8" for="F">Cantidad de productos: </label>
              <div class="col-sm-4" >
                <input type="number" class="form-control" step=1 min="1" id="unidades" name="unidades" value="1" required>
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="box-footer col-xs-12 box-gris ">
            <button type="submit" class="btn btn-primary">Producir</button>
          </div>


        </form>

      </div>

    </div>

  </div>
</section>

