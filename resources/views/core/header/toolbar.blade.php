<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        @user
            @include('core.header.toolbar.mensajes')
            @include('core.header.toolbar.tareas')
            @include('core.header.toolbar.notificaciones')

            @include('core.header.toolbar.user')
        @enduser

        @unlessuser
        <li>
            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Ingresar</a>
        </li>
        @endunless

        @rol('superadmin, admin')
        <li>
            <a href="{{ route('admin') }}"><i class="fa fa-gears"></i></a>
        </li>
        @endrol

    </ul>
</div>


