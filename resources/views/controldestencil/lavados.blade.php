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
                <h3 class="box-title">Registrar lavado</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <form method="post" action="{{ url('/controldestencil/lavados/create') }}">
                            @csrf
                            <div class="input-group">
                                <input name="codigo" class="form-control" placeholder="Ingresar codigo de stencil">

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

        @include('controldestencil.lista_lavados',['lavados'=>$lavados])
    </section>
    <!-- /.content -->
@endsection