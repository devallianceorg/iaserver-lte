@extends('core.layout')
@section('title','SMTDatabase')
@section('contenido')
    @include('smtdatabase.header')

    <div class="container">
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <h3>Resultados de búsqueda: "{{ $modelo }}"</h3>
        @foreach($materiales->groupBy('componente')  as $semielaborado => $materialList)
            <h3>{{ $semielaborado }}</h3>
            <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Panel</th>
                <th>Lote</th>
                <th>Componente</th>
                <th>Descripción</th>
                <th>Asignación</th>
            </tr>
            </thead>
                <tbody>
                    @foreach($materialList->sortBy('lote') as $material)
                        <tr>
                            <td> {{ $material["logop"] }}</td>
                            <td> {{ $material["lote"] }}</td>
                            <td> {{ $material["componente"] }}</td>
                            <td> {{ $material["descripcion_componente"] }}</td>
                            <td> {{ $material["asignacion"] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
        
    </div>
@endsection