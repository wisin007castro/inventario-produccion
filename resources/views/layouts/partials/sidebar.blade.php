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
     
            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>USUARIOS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('listado_usuarios') }}">Listado Usuarios</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-cart-plus'></i> <span>COMPRAS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="javascript:void(0);" onclick="cargar_formulario(4);" >Realizar Compra</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-cubes'></i> <span>PRODUCCIÓN</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="javascript:void(0);" onclick="cargar_formulario(5);" >Producir</a></li>
                    <li><a href="javascript:void(0);" onclick="" >Reporte de producción</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-shopping-cart'></i> <span>VENTAS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="javascript:void(0);" onclick="cargar_formulario(6);" >Realizar Compra</a></li>
                    <li><a href="javascript:void(0);" onclick="" >Reporte de ventas</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
