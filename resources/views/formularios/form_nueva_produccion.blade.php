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


          <div class="col-md-3">
            <div class="form-group">
              <label class="col-sm-4" for="F">Cantidad</label>
              <div class="input-group input-group-sm" >
                <input type="number" class="form-control" step=1 min="1" id="unidades" name="unidades" value="1" required>
              </div>
            </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-4">
            <div class="form-group">
              <label class="col-sm-3" for="F">Ganancia</label>
              <div class="input-group input-group-sm" >
                <!-- <input type="text" class="form-control" id="unidades" name="unidades"> -->
                <input type="text" class="form-control" id="ganancia" name="ganancia" value="35" disabled>
                <span class="input-group-addon"><i class="fa  fa-line-chart"></i></span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="col-sm-2" for="F">peso</label>
              <div class="input-group input-group-sm" >
                <!-- <input type="text" class="form-control" id="unidades" name="unidades"> -->
                <input type="text" class="form-control" id="peso" name="peso" value="3" disabled>
                <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
              </div>
            </div>
          </div>

          <div class="box-footer col-xs-12 box-gris ">
            <button type="submit" class="btn btn-primary">Producir</button>
          </div>


        </form>

      </div>

    </div>

  </div>
</section>

<!-- <script language="javascript">
function recargar(){    
       /// Aqui podemos enviarle alguna variable a nuestro script PHP
    var variable_post="Mi texto recargado";
       /// Invocamos a nuestro script PHP
    $.post("miscript.php", { variable: variable_post }, function(data){
       /// Ponemos la respuesta de nuestro script en el DIV recargado
    $("#unidades").html(data);
    });         
}
</script> -->
<script type="text/javascript"> 
    var uni = document.getElementById('unidades');
    var txtganancia = document.getElementById('ganancia');
    var txtpeso = document.getElementById('peso');
    uni.addEventListener('click',function(evento){
    if(uni.checked){
        txtganancia.value='35'
        txtpeso.value='3'
    }else{
        txtganancia.value=uni.value*35
        txtpeso.value=uni.value*3
    }
    },false);
</script>