<div class="box">
    <div class="box-header">
        <h3 class="box-title">Lavados recientes</h3>
    </div>

    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody><tr>
                <th>Operador</th>
                @if(!isset($hidecodigo))
                    <th>Codigo</th>
                @endif
                <th>Fecha</th>
                <th>Hora</th>
                @rol('superadmin')
                    <th style="width: 40px;"></th>
                @endrol
            </tr>
            @forelse($lavados['data'] as $item)
                <tr>
                    <td>{{ $item['operador']['name'] }}</td>
                    @if(!isset($hidecodigo))
                        <td><a href="{{ url('/controldestencil/detalle',$item['codigo']) }}">{{ $item['codigo'] }}</a></td>
                    @endif
                    <td>{{ $item['fecha'] }}</td>
                    <td>{{ $item['hora'] }}</td>
                    @rol('superadmin')
                    <td>
                        <form method="post" action="{{ url('/controldestencil/lavados/delete',$item['id']) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                    @endrol
                </tr>
                @empty
                <tr>
                    <td>No hay lavados registrados</td>
                </tr>
            @endforelse
            </tbody></table>
    </div>
    <!-- /.box-body -->
</div>
