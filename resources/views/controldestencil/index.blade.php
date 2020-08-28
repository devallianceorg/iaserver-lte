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
                    <div class="col-md-6">
                        @rol('stencil_admin, stencil_operador, superadmin')
                        <a class="btn btn-default pull-right">
                            <i class="fa fa-save"></i> Crear nuevo stencil
                        </a>
                        @endrol

                    </div>
                </div>

            </div>
            <!-- /.box-body -->
        </div>

        <controldestencil-stencil-abm-table codigo="{{ request('codigo') }}" search="{{ request('keyword') }}"></controldestencil-stencil-abm-table>

    </section>
    <!-- /.content -->
@endsection