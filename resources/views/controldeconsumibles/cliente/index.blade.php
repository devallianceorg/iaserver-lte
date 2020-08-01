@extends('core.layout')
@section('title','IAServer LTE - ControldeConsumibles Cliente CDC')
@section('contenido')
<section class="content-header" style="padding-bottom:30px;">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li >Control de Consumibles</li>
      <li class="active">Admin</li>
    </ol>
</section>
@rol('admin, superadmin, consumiblesadmin')
<div class="container">
  @include('controldeconsumibles.cliente.partial.tabs')
</div>
@endrol
@endsection