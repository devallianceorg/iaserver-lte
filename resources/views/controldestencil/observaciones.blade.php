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
                <h3 class="box-title">Observaciones recientes</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody><tr>
                        <th>Codigo</th>
                        <th>Operador</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        @rol('superadmin')
                        <td style="width: 40px;"></td>
                        @endrol
                    </tr>
                    @foreach($observaciones['data'] as $item)
                        <tr>
                            <td><a href="{{ route('controldestencil.detalle',$item['codigo']) }}">{{ $item['codigo'] }}</a></td>
                            <td>{{ $item['operador']['name'] }}</td>
                            <td>{{ $item['texto'] }}</td>
                            <td>{{ $item['fecha'] }}</td>
                            <td>{{ $item['hora'] }}</td>
                            @rol('superadmin')
                            <td>
                                <form method="post" action="{{ route('controldestencil.observaciones.delete',$item['id']) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            @endrol
                        </tr>
                    @endforeach

                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>

    </section>
    <!-- /.content -->
@endsection