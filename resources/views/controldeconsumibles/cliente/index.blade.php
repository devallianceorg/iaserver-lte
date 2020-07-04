@extends('core.layout')
@section('title','IAServer LTE - ControldeConsumibles Cliente CDC')
@section('contenido')
@rol('admin, superadmin, consumiblesadmin')
<div class="container">
  @include('controldeconsumibles.cliente.partial.header')
</div>
@endrol
@endsection