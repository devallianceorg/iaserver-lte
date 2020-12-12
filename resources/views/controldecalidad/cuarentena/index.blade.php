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
    <a href="{{ route('controldecalidad.cuarentena.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Crear cuarentena</a>
    <hr>
    <controldecalidad-cuarentena-home :cuarentenas="{{ $cuarentenas }}"/>
  </div>
@endsection