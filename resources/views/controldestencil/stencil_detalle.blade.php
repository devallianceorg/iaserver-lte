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
                @include('controldestencil.lista_lavados',['hidecodigo'=>true])
            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Stencil</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body padding">
                        <p>
                            <b>Codigo</b> {{ $stencil['codigo'] }}
                        </p>
                        <p>
                            <b>Codigo de ubicacion</b> {{ $stencil['ubicacion']['codigo_ubicacion'] }}
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>

                <p>
                    @rol('superadmin')
                    <button class="btn btn-block btn-danger">
                        Eliminar stencil
                    </button>
                    @endrol
                </p>


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Observaciones</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-footer box-comments">
                        @forelse($observaciones['data'] as $item)
                            <div class="box-comment">
                                @rol('superadmin')
                                <div class="pull-right">
                                    <form method="post" action="{{ url('/controldestencil/observaciones/delete',$item['id']) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                                @endrol
                                <div class="comment-text">
                                      <span class="username">
                                        {{ $item['operador']['name'] }}
                                        <span class="text-muted">{{ $item['fecha'] }} - {{ $item['hora'] }}</span>
                                      </span>
                                    <!-- /.username -->
                                    {{ $item['texto'] }}
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <!-- /.box-comment -->
                        @empty
                            Sin observaciones
                        @endforelse
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <form action="{{ url('/controldestencil/observaciones/create') }}" method="post">
                            @csrf
                            <input type="hidden" name="codigo" value="{{ $stencil['codigo'] }}">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="text" name="texto" class="form-control input-sm" placeholder="Redacte una observacion">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection