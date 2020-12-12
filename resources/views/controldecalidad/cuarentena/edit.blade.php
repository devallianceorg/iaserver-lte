@extends('core.layout')
@section('title','IAServer LTE - Lanzamientos')
@section('nobox',true)
@section('mini',false)
@section('contenido')
  <section class="content-header" style="padding-bottom:30px;">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li> Calidad</li>
      <li class="active"> Cuarentena</li>
    </ol>
  </section>
  <div class="container" id="vuelte">
    <controldecalidad-cuarentena-home />
  </div>
@endsection