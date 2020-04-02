@extends('core.layout')
@section('title','IAServer LTE - SMTDatabase')
@section('contenido')
<div class="container">
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <form class="form-horizontal" role="form" method="post" action="{{ route('smtdatabase.componentes.buscar') }}">
            @csrf
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-1">
                    <h3>Buscar componente</h3>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-1">
                    <input required type="text" class="form-control" placeholder="Ej: EAG63530103" name="componente">
                </div>
                <div class="col-sm-4">
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
            </div>
        </form>

        <form class="form-horizontal" role="form" method="post" action="{{ route('smtdatabase.componentes.buscar.semielaborado') }}">
            @csrf
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-1">
                    <h3>Buscar semielaborado</h3>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="input-group">
                        <div class="input-group-addon">4-651-</div>
                        <input type="text" class="form-control" placeholder="Resto del codigo" name="componente" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
            </div>
        </form>

        <form class="form-horizontal" role="form" method="post" action="{{ route('smtdatabase.componentes.buscar.semielaborado.modelo') }}">
            @csrf
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-1">
                    <h3>Buscar Semielaborado por modelo</h3>
                </div>
            </div>

            <div class="form-group">
                <div  ng-controller="TypeaheadCtrl" class="col-sm-4 col-sm-offset-1 ng-scope">
                    <input autocomplete="off" type="text" placeholder="Ej: 19EN33" name="modelo" ng-model="selected" class="form-control" required >
                </div>
                <div class="col-sm-4">
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection