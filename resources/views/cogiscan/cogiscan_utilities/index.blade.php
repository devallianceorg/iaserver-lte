@extends('core.layout')
@section('title','Cogiscan - Cogiscan Utilities')
@section('nobox',true)
@section('mini',false)
@section('contenido')
<section class="content-header" style="padding-bottom:30px;">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Cogiscan Utilities</li>
    </ol>
</section>
<div class="container" id="vuelte">
  @include('cogiscan.cogiscan_utilities.partial.header')
  @include('cogiscan.cogiscan_utilities.partial.tabs')
</div>
@endsection