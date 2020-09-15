@extends('core.layout')
@section('title','IAServer LTE - Rutas AOI')
@section('contenido')
<section class="content-header" style="padding-bottom:30px;">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li >AOICollector</li>
      <li class="active">Rutas AOI</li>
    </ol>
</section>
<div class="container">
  <div>
    <aoicollector-routes-header />
  </div>
  <div class="row">
    <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
      <aoicollector-routes-registrar />
    </div>
  </div>
</div>
@endsection