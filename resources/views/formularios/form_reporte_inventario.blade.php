<div class="callout callout-info">
    <div class="input-group">
        <h4>Reporte de Inventario</h4>
      <span class="input-group-btn">
      </span>
    </div>
</div>  

<section>

  <div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="fa fa-cubes"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Productos en Inventario</span>
        <span class="info-box-number"><h3><b>{{$producto->unidades}}</b> Unidades</h3> </span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
    <div class="info-box bg-green">
      <span class="info-box-icon"><i class="fa fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Costo de Productos</span>
        <span class="info-box-number"><h3><b>{{$producto->unidades * 35}}</b> Bs.</h3> </span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
        <div class="info-box bg-blue">
      <span class="info-box-icon"><i class="fa fa-balance-scale"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Peso Total</span>
        <span class="info-box-number"><h3><b>{{$producto->unidades * 3}}</b> kg.</h3> </span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.box -->

  <div class="col-md-4">
    <p class="text-center">
      <strong>Insumos en Inventario</strong>
    </p>
  @php
  $colores = array("black", "aqua", "blue", "green", "yellow", "red");
  
  $i = 0;
  @endphp  

  
  @foreach($insumos as $insumo)
  @php 
  if($insumo->cantidad > 0){
  $p_cant_ins = round($insumo->cantidad * 100 / $total_insumos, 0);
  }else{
  $p_cant_ins = 0;
  }
  @endphp
    <a href="javascript:void(0);" onclick="cargar_formulario(4);" >
      <div class="progress-group">
        <span class="progress-text">{{$insumo->detalle}} :</span>

        <span class="progress-number"><small class="label pull-right bg-gray">{{$insumo->cantidad}} Kg</small></span>
                <!-- <span class="progress-number"><b>{{$p_cant_ins}}</b>/ Kg</span> -->
        <div class="progress sm">
          
            <div class="progress-bar progress-bar-{{$colores[$i]}}" style="width: {{$p_cant_ins}}%"></div>

          
        </div>
      </div><!-- /.progress-group -->
    </a>
    @php 
    $i++
    @endphp
  @endforeach
  </div>

  <div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box bg-red">
      <span class="info-box-icon"><i class="fa  fa-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Costo de Insumos</span>
        <span class="info-box-number"><h3><b>{{$costo_insumos}}</b> Bs.</h3></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
    <div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Ventas</span>
        <span class="info-box-number"><h3><b>{{$total_ventas}}</b> Bs.</h3></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->

  </div><!-- /.box -->
</div>
</section>

<script>

function refresh()
{
    location.reload(true);
}

</script>