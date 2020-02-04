<div class="table-responsive">
    <table class="table no-margin">
        <thead>
        <tr>
            <th>Tabla</th>
            <th>Errores</th>
            <th>Pickups</th>
            <th>Rate</th>
            <th>Grafico</th>
        </tr>
        </thead>
        <tbody>
        @foreach($feeders as $item)
            <tr>
                <td>{{ $item['fullname'] }}</td>
                <td><span class="label label-danger">{{ $item['total_error'] }}</span></td>
                <td>{{ $item['total_pickup'] }}</td>
                <td>{{ $item['rate'] }}</td>
                <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="30">{{ collect($item['detail'])->pluck('total_error')->join(',')  }}</div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@section('endjs')

    <!-- Sparkline -->
    <script src="{{ asset('lte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <script>
    // -----------------
    // - SPARKLINE BAR -
    // -----------------
    $('.sparkbar').each(function () {
        var $this = $(this);
        $this.sparkline('html', {
            type    : 'line',
            height  : $this.data('height') ? $this.data('height') : '30',
            width  : 200,
            barColor: $this.data('color')
        });
    });
    </script>
@append