@extends('core.layout')
@section('title','IAServer LTE - Control de Stencils')
@section('contenido')
<div class="container">
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <h3>Control de Stencils</h3>
    </div>
@endsection