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
        <div class="row">
            <div class="col-md-8">
                <controldestencil-lavados-abm-table codigo="{{ $stencil['codigo'] }}"></controldestencil-lavados-abm-table>
                <controldestencil-observaciones-abm codigo="{{ $stencil['codigo'] }}"></controldestencil-observaciones-abm>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Stencil</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body padding">
                        @if($stencil)
                        <p>
                            <b>Codigo</b> {{ $stencil['codigo'] }}
                        </p>
                        <p>
                            <b>Codigo de ubicacion</b> {{ $stencil['ubicacion']['codigo_ubicacion'] }}
                        </p>
                        @else
                            <code>Error al obtener datos de stencil</code>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>

                <controldestencil-tension-abm codigo="{{ $stencil['codigo'] }}"></controldestencil-tension-abm>

                <p>
                    @rol('superadmin')
                    <button class="btn btn-block btn-danger">
                        Eliminar stencil
                    </button>
                    @endrol
                </p>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection