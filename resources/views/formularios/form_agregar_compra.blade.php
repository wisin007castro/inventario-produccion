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

          <div class="col-md-6">
            <div class="form-group">
            <label class="col-sm-3" for="tipo">Articulo</label>
                <div class="col-sm-9" >         
                  <select id="id_art" name="id_art" class="form-control">
                     @foreach($insumos as $ins)
                        <option value="{{ $ins->id }}">{{ $ins->articulo }}</option>
                     @endforeach
                  </select>    
                </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label class="col-sm-3" for="nombre">Cantidad (Kg)</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" min="0" name="cant" value="1" required>
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="box-footer col-xs-12 box-gris ">
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>


      </form>
                    
    </div>
                    
  </div>
                       
  </div>
</section>

