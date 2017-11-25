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

          <div class="col-md-6">
            <div class="form-group">
              <label class="col-sm-2" for="A">A</label>
              <div class="col-sm-10" >
                <input type="number" class="form-control" min="0" id="a" name="a" value="0" required>
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-6">
            <div class="form-group">
              <label class="col-sm-2" for="B">B</label>
              <div class="col-sm-10" >
                <input type="number" class="form-control" min="0" id="b" name="b"  value="0" required>
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-6">
            <div class="form-group">
              <label class="col-sm-2" for="C">C</label>
              <div class="col-sm-10" >
                <input type="number" class="form-control" min="0" id="c" name="c"  value="0" required>
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-6">
            <div class="form-group">
              <label class="col-sm-2" for="D">D</label>
              <div class="col-sm-10" >
                <input type="number" class="form-control" min="0" id="d" name="d"  value="0" required>
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-6">
            <div class="form-group">
              <label class="col-sm-2" for="D">E</label>
              <div class="col-sm-10" >
                <input type="number" class="form-control" min="0" id="e" name="e"  value="0" required>
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-6">
            <div class="form-group">
              <label class="col-sm-2" for="F">F</label>
              <div class="col-sm-10" >
                <input type="number" class="form-control" min="0" id="f" name="f"  value="0" required>
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

