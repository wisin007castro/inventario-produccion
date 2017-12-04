<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b></span>
        <!-- logo for regular state and mobile devices -->
        <div>
            <img style="width:100%;height:60px;" src="{{url('img/logo.png')}}" alt="Photo">
        </div>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>



        <!-- Navbar Right Menu -->
        <div id="refrescar_tareas" class="navbar-custom-menu">


            <ul class="nav navbar-nav">
                <!-- Notifications Menu -->

                @can('reporte_ventas')
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        @if($cant_agotados > 0)
                        <span class="label label-danger">{{ $cant_agotados }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">

                        <li class="header">Tiene {{ $cant_agotados }} insumos agotados</li>
                        <li>

                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                    @foreach ($insumos_alerta as $insumo)
                                    @if($insumo->cantidad <=2 )
                                <li><!-- start notification -->
                                    <a href="#">                      
                                        <i class="fa fa-cubes text-red"></i> {{$insumo->detalle}}: <b>{{ $insumo->cantidad}} Kgs </b> restantes

                                    @endif 
                                    @endforeach
                                    </a>
                                </li><!-- end notification -->
                            </ul>
                        </li>
                        @can('realizar_compras')
                        <li class="footer"><a href="javascript:void(0);" onclick="cargar_formulario(4);" >Realizar Compras</a></li>
                        @else
                        @endcan
                    </ul>
                </li>
                @else
                @endcan
                @php 
                $pedidos = 0;
                $reservas = 0;
                $tot_pedidos = 0;
                $tot_reservas = 0;
                foreach($tarea_ventas as $venta){
                    if($venta->detalle == 'Pedido'){
                        $pedidos++;
                    }
                    if($venta->detalle == 'Reserva'){
                        $reservas++;
                    }
                }
                if($tareas >0){
                    $tot_pedidos = $pedidos * 100 / $tareas;
                    $tot_reservas = $reservas * 100 / $tareas;
                }
                @endphp

                <!-- Tasks Menu -->
                @can('reporte_ventas')
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        @if($tareas > 0)
                        <span class="label label-warning">{{$tareas}}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ $tareas }} Tareas Pendientes</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            Pedido(s) pendiente(s)
                                            <p class="pull-right">{{$pedidos}}</p>
                                        </h3>
                                        <!-- The progress bar -->
                                        <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-blue" style="width: {{$tot_pedidos}}%" role="progressbar" aria-valuenow="{{$tot_pedidos}}" aria-valuemin="0" ari{{$tot_pedidos}} aria-valuemax="100">
                                                
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->

                                                                <li><!-- Task item -->
                                    <a href="#">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            Reserva(s) pendiente(s)
                                            <p class="pull-right">{{$reservas}}</p>
                                        </h3>
                                        <!-- The progress bar -->
                                        <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-green" style="width: {{$tot_reservas}}%" role="progressbar" aria-valuenow="{{$tot_reservas}}" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            @can('reporte_ventas')
                            <a href="{{url('listado_ventas')}}" >Ver todas las Tareas</a>
                            @else
                            @endcan
                        </li>
                    </ul>
                </li>
                @else
                @endcan

                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{asset('/img/avatar_1.jpg')}}" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{asset('/img/avatar_1.jpg')}}" class="img-circle" alt="User Image" />
                                <p>
                                {{ Auth::user()->name }}
                              <small><script>
                                      var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                      var f=new Date();
                                      document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                  </script></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
 <!--                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.followers') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.sales') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.friends') }}</a>
                                </div>
                            </li> -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" onclick="verinfo_usuario({{  Auth::user()->id }})" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.profile') }}</a>
                                </div>
                                <div class="pull-right">

                                   <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="btn btn-default btn-flat"  >
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>