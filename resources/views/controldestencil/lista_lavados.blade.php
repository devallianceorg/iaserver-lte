<div class="box">
    <div class="box-header">
        <h3 class="box-title">Lavados recientes</h3>
    </div>

    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody><tr>
                <th>Operador</th>
                <th>Fecha</th>
                <th>Hora</th>
                @rol('superadmin')
                    <th style="width: 40px;"></th>
                @endrol
            </tr>
            @forelse($lavados['data'] as $item)
                <tr>
                    <td>{{ $item['operador']['name'] }}</td>
                    <td>{{ $item['fecha'] }}</td>
                    <td>{{ $item['hora'] }}</td>
                    @rol('superadmin')
                    <td>
                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
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
