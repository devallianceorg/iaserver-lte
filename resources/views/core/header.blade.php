@inject('user', 'App\Http\Controllers\Core\ApiLogin')
<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>IA</b>5</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>IAServer</b> 5.0</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        @include('core.header.toolbar')
    </nav>
</header>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVEGACION</li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-qrcode"></i> <span>AOI</span>
                </a>
                <ul class="treeview-menu">
                    @rol('admin, superadmin, smtdatabase_admin')
                    <li>
                        <a href="">
                            <i class="fa fa-road"></i> <span>Rutas AOI</span>
                        </a>
                    </li>
                    @endrol
                    <li>
                        <a href="{{ route('aoi.registrar') }}">
                            {{-- Consultar por nombre de ruta --}}
                            <i class="fa fa-newspaper-o"></i> <span>Registrar Placas</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-dashboard"></i> <span>Estadísticas AOI</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-search"></i> <span>Inspecciones AOI</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-list-alt"></i> <span>Pizarra de Producción</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-eye"></i> <span>Calidad</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('controldecalidad.lanzamientos') }}">
                            <i class="fa fa-paper-plane"></i> <span>Lanzamientos</span>
                        </a>
                    </li>
                    <li disabled>
                        <a href="" disabled>
                            <i class="fa fa-bug"></i> <span>Cuarentena</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('/npmpicker') }}">
                    <i class="fa fa-signal"></i> <span>Control de pickups</span>
                </a>
            </li>
            <li>
                <a href="javascript:remoteLink('http://localhost:8002/aplicacion/npmpicker/')">
                    <i class="fa fa-dot-circle-o"></i> <span>Control de pickups</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-red">old</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ url('/smtdatabase') }}">
                    <i class="fa fa-database"></i> <span>SMTDatabase</span>
                </a>
            </li>
            <li>
                <a href="{{ route('ordendetrabajo.index') }}">
                    <i class="fa fa-sort-amount-asc"></i> <span>Orden de Trabajo</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/controldestencil') }}">
                    <i class="fa fa-object-ungroup"></i> <span>Control de Stencil</span>
                </a>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-cc"></i> <span>Control de Consumibles</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('controldeconsumibles.index') }}">
                            <i class="fa fa-barcode"></i> <span>Registrar</span>
                        </a>
                    </li>
                    @rol('admin, superadmin, consumibles_admin')
                    <li>
                        <a href="{{ route('controldeconsumibles.cliente.index') }}">
                            <i class="fa fa-newspaper-o"></i> <span>Administrar</span>
                        </a>
                    </li>
                    @endrol
                </ul>
            </li>
            @rol('admin, superadmin, cogiscan_admin, cogiscan_materialista')
            <li class="treeview">
                <a href="">
                    <i class="fa fa-contao"></i> <span>Cogiscan</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/cogiscan/cogiscan_utilities') }}">
                            <i class="fa fa-barcode"></i> <span>Cogiscan Utilities</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endrol
            <li>
                <a href="{{ url('/controldeplacas') }}">
                    <i class="fa fa-exchange"></i> <span>Control de Placas</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/memorias') }}">
                    <i class="fa fa-film"></i> <span>Grabación de Memorias</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
