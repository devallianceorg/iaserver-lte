@rol('superadmin')
<li><a href="{{ route('admin') }}">Administracion</a></li>
@enduser

@permiso('npmpicker.index')
<li class="{{request()->is('npmpicker*') ? ' active' : ''}}"><a href="{{ route('npmpicker.index') }}">Centros</a></li>
@endpermiso
