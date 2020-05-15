@extends('core.layout')
@section('title','IAServer LTE - Control de Stencils')
@section('contenido')
    <section class="content-header">
        <h1>
            Control de Stencil
            <small>Administre todos sus stenciles</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('controldestencil.iconbar')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Buscar stenciles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <form method="post">
                            @csrf
                            <div class="input-group">
                                <input name="codigo" class="form-control" placeholder="Buscar por codigo">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form method="post">
                            @csrf
                            <div class="input-group">
                                <input name="keyword" class="form-control" placeholder="Buscar por palabra clave">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de stenciles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody><tr>
                        <th>Codigo</th>
                        <th>Ubicacion</th>
                        <th>Modelo</th>
                        <th>Placa</th>
                        <th>Lado</th>
                        <th>Grabado</th>
                        <th>Job / Serie</th>
                        <th>Cliente</th>
                        <th>PCB</th>
                        <th>Notas</th>
                        <th>Usos</th>
                        <th>Fecha de ingreso</th>
                    </tr>
                    @forelse($stenciles['data'] as $item)
                    <tr>
                        <td><a href="{{ route('controldestencil.detalle',$item['codigo']) }}">{{ $item['codigo'] }}</a></td>
                        <td>{{ $item['ubicacion']['codigo_ubicacion'] }}</td>
                        <td>{{ $item['modelo'] }}</td>
                        <td>{{ $item['placa'] }}</td>
                        <td>{{ $item['lado'] }}</td>
                        <td>{{ $item['serie'] }}</td>
                        <td>{{ $item['job'] }}</td>
                        <td>{{ $item['cliente'] }}</td>
                        <td>{{ $item['pcb'] }}</td>
                        <td>{{ $item['observaciones_count'] }}</td>
                        <td>{{ $item['usos'] }}</td>
                        <td>{{ $item['ingreso'] }}</td>
                        @rol('superadmin')
                        <td style="width:70px;">
                            <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                        </td>
                        @endrol
                    </tr>
                        @empty
                        <tr>
                            <td>
                                No hay resultados
                            </td>
                        </tr>
                    @endforelse

                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection