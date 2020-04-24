@extends('core.layout')
@section('title','IAServer LTE - Administtracion')
@section('contenido')
    <section class="content-header">
        <h1>
            Administracion
            <small>Configure las variables que controlan IAServer</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div>
            <a class="btn btn-app">
                <span class="badge bg-aqua">{{ $users['total'] }}</span>
                <i class="fa fa-users"></i> Usuarios
            </a>

            <a class="btn btn-app">
                <span class="badge bg-aqua">{{ $roles['total'] }}</span>
                <i class="fa fa-briefcase"></i> Roles
            </a>

            <a class="btn btn-app">
                <span class="badge bg-aqua">{{ $permisos['total'] }}</span>
                <i class="fa fa-cogs"></i> Permisos
            </a>

        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Permisos</th>
                    </tr>
                    @foreach($users['data'] as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>
                            {{ collect($item['acl']['roles'])->join(',') }}
                        </td>
                        <td>
                            {{ collect($item['acl']['permisos'])->join(',') }}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de roles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                    </tr>
                    @foreach($roles['data'] as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Permisos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Permiso</th>
                    </tr>
                    @foreach($permisos['data'] as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

    </section>
    <!-- /.content -->
@endsection