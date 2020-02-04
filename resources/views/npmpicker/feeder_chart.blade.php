<div id="stats"></div>

@section('endjs')
    <script src="{{ asset('js/npmpicker/highchart_mod/highcharts.src.js') }}"></script>
    <script src="{{ asset('js/npmpicker/v4.js') }}"></script>

    <script>
        $(function(){

            @foreach($feeders as $item)
                @php
                    $detail = collect($item['detail']);
                    $lastStat = collect($item['detail'])->last();
                @endphp
            loadFeeder(
                    '{{ $item['id'] }}',
                    '{{ $lastStat['id'] }}',
                    '{{ $item['fullname'] }}',
                    {!!
                        $detail->map(function ($d) {
                            $ajuste = $d['ajuste'];
                            $err = $d['total_error'];
                            if($ajuste) {
                                return [
                                    'y' => $err,
                                    'marker' => [
                                        'lineWidth' => 3,
                                        'symbol' =>"circle",
                                        'fillColor'=> "#b2ddff",
                                        'lineColor'=> "#0090ff",
                                        'radius'=> 6
                                    ]
                                ];
                            }

                            return $err;
                        })
                    !!},
                    {!! $detail->pluck('hora')  !!},
                    {!!
                        $detail->map(function ($d) {
                            $inspeccionado = $d['inspeccion'];
                            if($inspeccionado) {
                                return $d['total_error'];
                            }
                        })
                    !!},
                    '{{ $item['total_pickup'] }}',
                    '{{ $item['rate'] }}',
                    '{{ $item['total_error'] }}',
                    '{{ $item['estado'] }}',
                    '{{ $item['rate_level'] }}');

            @endforeach

        });
    </script>
@append