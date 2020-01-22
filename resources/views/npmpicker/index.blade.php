@extends('core.layout')

@section('contenido')
    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            NPMPicker
        </h1>
    </section>

    <section class="content">
    @if(isset($info['error']))
        <div class="alert alert-danger">
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            {{ $info['error'] }}
        </div>
    @else
        <div class="row">
                <div class="col-sm-2">
                    <div class="box box-widget">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                @foreach($info['lineas']['result'] as $id => $item )
                                    <li><a href="?linea={{$item['id_linea']}}">SMD-{{ $item['id_linea'] }}<span class="pull-right badge bg-red">{{ $item['inestable'] }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Detalle de SMD-{{ $linea }}</h3>
                        </div>
                        <div class="box-body">

                    <pre>
                    @json($info['feeders'], JSON_PRETTY_PRINT);
                    </pre>

                        </div>
                        <!-- /.box-body -->
                    </div>



                </div>
            </div>
    @endif
    </section>


@endsection
