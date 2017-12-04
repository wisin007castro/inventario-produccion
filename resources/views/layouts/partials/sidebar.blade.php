<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/avatar_1.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MODULOS</li>
            <!-- Optionally, you can add icons to the links -->
            @can('listar_usuarios')
            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>USUARIOS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('listado_usuarios') }}">Listado Usuarios</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>
            @else
            @endcan
            @can('realizar_compras')
            <li class="treeview">
                <a href="#"><i class='fa fa-cart-plus'></i> <span>COMPRAS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="javascript:void(0);" onclick="cargar_formulario(4);" >Realizar Compra</a></li>
                    <li><a href="{{url('listado_compras')}}"  >Reporte de Compras</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>
            @else
            @endcan
            @can('producir')
            <li class="treeview">
                <a href="#"><i class='fa fa-cubes'></i> <span>PRODUCCIÓN</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="javascript:void(0);" onclick="cargar_formulario(5);" >Producir</a></li>
                    <li><a href="javascript:void(0);" onclick="cargar_formulario(8);" >Reporte de Inventario</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>
            @else
            @endcan
            
            <li class="treeview">
                <a href="#"><i class='fa fa-shopping-cart'></i> <span>TIENDA</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('vender')
                    <li><a href="javascript:void(0);" onclick="cargar_formulario(6);" >Realizar Venta</a></li>
                    @else
                    @endcan
                    @can('pedido')
                    <li><a href="javascript:void(0);" onclick="cargar_formulario(7);" >Realizar Compra</a></li>
                    @else
                    @endcan
                    @can('reporte_ventas')
                    <li><a href="{{url('listado_ventas')}}" >Reporte de ventas</a></li>
                    @else
                    @endcan
                    <li><a href="#"></a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
