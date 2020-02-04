@extends('core.layout')

@section('contenido')
    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            NPMPicker
        </h1>
    </section>

    <section class="content">
    @if(isset($error) && count($error))
        <div class="alert alert-danger">
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            @foreach($error as $method => $err)
                <div>
                    * <b>{{ $method }}</b>: {{ (isset($err['error'])) ? $err['error'] : $err }}
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
                <div class="col-sm-2">
                    <div class="box box-widget">
                        <div class="box-header">
                            <h3 class="box-title">Lineas activas</h3>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                @if(isset($lineas) && count($lineas)>0)
                                    @foreach($lineas as $id_linea => $item )
                                        @if($id_linea==$linea)
                                            <li><a href="#" class="bg-success"><span class="fa fa-hand-o-right"></span> SMD-{{$id_linea}}</a></li>
                                        @else
                                        <li><a href="?linea={{$id_linea}}&fecha={{ $fecha }}">SMD-{{ $id_linea }}</a></li>
                                        @endif
                                    @endforeach
                                @else
                                    <li>
                                        <a href="#">
                                            Sin lineas activas
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Detalles de SMD-{{ $linea }} dia <b>{{ $fecha }}</b> turno <b>{{ $turno }}</b></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if(count($feeders)==0)
                                No hay feeders inestables
                            @else
                                @include('npmpicker.feeder_chart')
                            @endif
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                    </div>


                </div>
            </div>
    @endif
    </section>

@endsection
