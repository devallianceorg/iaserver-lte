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

        <controldestencil-observaciones-abm-table></controldestencil-observaciones-abm-table>
    </section>
    <!-- /.content -->
@endsection