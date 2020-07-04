@extends('core.layout')
@section('title','IAServer - Control de Placas')
@section('contenido')
  <section class="content-header" style="padding-bottom:30px;">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Control de Placas</li>
      </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    @include('controldeplacas.partial.header')
    @include('controldeplacas.partial.tabla_salidas')
    @include('controldeplacas.partial.footer')
  </section>
@endsection