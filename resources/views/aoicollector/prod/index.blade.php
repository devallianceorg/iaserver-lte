@extends('core.layout')
@section('title','IAServer LTE - Registrar Placas')
@section('contenido')
<section class="content-header" style="padding-bottom:30px;">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li >AOICollector</li>
      <li class="active">Registrar Placas</li>
    </ol>
</section>
<div class="container">
  <div>
    <aoicollector-prod-registrar-header />
  </div>
  <div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
      <aoicollector-prod-stocker/>
    </div>
    <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
      <aoicollector-prod-registrar-produccion />
    </div>
  </div>
  {{-- @include('aoicollector.prod.partial.infoop') --}}
  {{-- @include('aoicollector.prod.partial.footer') --}}
</div>
@endsection