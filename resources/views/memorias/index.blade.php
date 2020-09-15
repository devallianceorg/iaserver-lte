@extends('core.layout')
@section('title','Grabación de Memorias')
@section('nobox',true)
@section('mini',false)
@section('contenido')
<section class="content-header" style="padding-bottom:30px;">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Grabación de Memorias</li>
    </ol>
</section>
<div class="container" id="vuelte">
  @include('memorias.partial.header')
  @include('memorias.partial.programas')
</div>
@endsection