@extends('core.layout')
@section('contenido')
    @include('smtdatabase.header')

    <div class="container">
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <h3>Resultados de búsqueda</h3>

        <table class="table table-bordered table-striped">
        <thead>
        <tr>
            {{-- REVISAR --}}
            {{-- <th></th> --}}
            <th>Modelo</th>
            <th>Panel</th>
            <th>Componente</th>
            <th>Descripción</th>
            <th>Asignación</th>
        </tr>
        </thead>
            <tbody>
                @if(isset($materiales))
                    @foreach($materiales as $material)
                        <tr>
                            {{-- REVISAR --}}
                            {{-- <td class="text-center"> <a href="#" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Info</a> </td> --}}
                            <td> {{ $material["modelo"] }}</td>
                            <td> {{ $material["logop"] }}</td>
                            <td> {{ $material["componente"] }}</td>
                            <td> {{ $material["descripcion_componente"] }}</td>
                            <td> {{ $material["asignacion"] }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>

    {{-- @include('iaserver.common.footer') --}}
@endsection