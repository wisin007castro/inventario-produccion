<section class="content" >

 <div class="col-md-12">

  <div class="box box-primary  box-gris">
 
    <div class="box-header with-border my-box-header">
      <h3 class="box-title"><strong>Compras</strong></h3>
    </div><!-- /.box-header -->
      
      <hr style="border-color:white;" />
 
    <div class="box-body">
              
      <form   action="{{ url('agregar_compra') }}"  method="post" id="f_agregar_compra" class="formentrada" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}"> 

          <div class="col-md-8">
            <div class="form-group">
              <label class="col-sm-3" for="tipo"><h4>Articulo A </h4> </label>
              <div class="col-sm-3">
                  <h4> <i class="fa fa-balance-scale"></i> Cantidad: </h4>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="0" name="1" required>
                    <span class="input-group-addon">(Kg) <i class="fa fa-check"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group">
              <label class="col-sm-3" for="tipo"><h4>Articulo B </h4> </label>
              <div class="col-sm-3">
                  <h4> <i class="fa fa-balance-scale"></i> Cantidad: </h4>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="0" name="2" required>
                    <span class="input-group-addon">(Kg) <i class="fa fa-check"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group">
              <label class="col-sm-3" for="tipo"><h4>Articulo C </h4> </label>
              <div class="col-sm-3">
                  <h4> <i class="fa fa-balance-scale"></i> Cantidad: </h4>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="0" name="3" required>
                    <span class="input-group-addon">(Kg) <i class="fa fa-check"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group">
              <label class="col-sm-3" for="tipo"><h4>Articulo D </h4> </label>
              <div class="col-sm-3">
                  <h4> <i class="fa fa-balance-scale"></i> Cantidad: </h4>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="0" name="4" required>
                    <span class="input-group-addon">(Kg) <i class="fa fa-check"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group">
              <label class="col-sm-3" for="tipo"><h4>Articulo E </h4> </label>
              <div class="col-sm-3">
                  <h4> <i class="fa fa-balance-scale"></i> Cantidad: </h4>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="0" name="5" required>
                    <span class="input-group-addon">(Kg) <i class="fa fa-check"></i></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-8">
            <div class="form-group">
              <label class="col-sm-3" for="tipo"><h4>Articulo F </h4> </label>
              <div class="col-sm-3">
                  <h4> <i class="fa fa-balance-scale"></i> Cantidad: </h4>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                    <input type="number" class="form-control" min="0" value="0" name="6" required>
                    <span class="input-group-addon">(Kg) <i class="fa fa-check"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class="box-footer col-xs-12 box-gris ">
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>


      </form>
                    
    </div>
                    
  </div>
                       
  </div>
</section>

