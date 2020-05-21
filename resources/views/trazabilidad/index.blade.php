@extends('core.layout')
@section('title','IAServer LTE - SMTDatabase')
@section('contenido')
<div class="container" id="vuelte">
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table style="width: 100%">
            <tr>
                <td style="vertical-align: top;">
                    @include('trazabilidad.partial.header')

                    {{-- @{{ modal }} --}}
                    <div style="padding: 5px;">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @include('trazabilidad.op')

                    </div>
                </td>
            </tr>
        </table>
</div>
@endsection