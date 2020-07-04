@inject('user', 'App\Http\Controllers\Core\ApiLogin')

@extends('core.layout')
@section('title','IAServer')
@section('contenido')
    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            IAServer <small>5.0</small>
        </h1>
    </section>

    <section class="content">

        @user
            Bienvenido:
            <b>
                {{ strtoupper($user::name()) }}
            </b>

            @rol('superadmin')
                <code>Usted tiene el rol de super administrador</code>
            @endrol

            <div>
                Sus roles son: <b>{{ $user::roles()->join(',') }}</b>
            </div>

            <div>
                Sus permisos son: <b>{{ $user::permisos()->join(',') }}</b>
            </div>

        @enduser

    </section>
@endsection
