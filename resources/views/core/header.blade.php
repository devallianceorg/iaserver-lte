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
            <li>
                <a href="{{ route('npmpicker.index') }}">
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
                <a href="{{ route('smtdatabase.index') }}">
                    <i class="fa fa-database"></i> <span>SMTDatabase</span>
                </a>
            </li>
            <li>
                <a href="{{ route('controldestencil.index') }}">
                    <i class="fa fa-object-ungroup"></i> <span>Control de Stencil</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
