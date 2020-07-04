@extends('core.layout')
@section('title','IAServer LTE - ControldeConsumibles')
@section('nobox',true)
@section('mini',false)
@section('contenido')
<div class="container" id="vuelte">
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div>
          @include('controldeconsumibles.partial.header')
        </div>
        <div>
          @include('controldeconsumibles.partial.registrar')
        </div>
        <div>
          @include('controldeconsumibles.partial.historial_egresos')
        </div>
        
</div>
@endsection