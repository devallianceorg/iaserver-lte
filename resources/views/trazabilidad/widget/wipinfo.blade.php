<h3>
    {{ $wip["wip_ot"]["nro_op"] }}
</h3>
<small>Estado:</small> <span style="padding: 5px;" class="label label-{{ $wip['active'] ? 'success' : 'danger' }}">{{ $wip['active'] ? 'ACTIVA' : 'CERRADA' }}</span>
@rol('admin,superadmin')
    @if($wip["active"])
        <smtdatabase-declarar-op :wip='@json($wip)'></smtdatabase-declarar-op>
    @endif
@endrol

<small>Modelo:</small>
@if(isset($smt))
     {{ $smt["modelo"] }} - {{ $smt["panel"] }} - {{ $smt["lote"] }}
     @rol('superadmin,admin,inventario_admin')
        <smtdatabase-editar-modelo :smt='@json($smt)'></smtdatabase-editar-modelo>
     @endrol
@else
    <span class="label label-danger">No hay datos en SMTDatabase</span>
@endif

<small>Semielaborado:</small> {{ $wip["wip_ot"]["codigo_producto"] }}
@if($wip["active"] )
    <small>Descripcion:</small>
    <span style="font-size: 12px;">{{ $wip["wip_ot"]["description"] }}</span>
    <small>Cantidad de lote: <span class="glyphicon glyphicon-info-sign" tooltip-placement="right" tooltip="Cantidad de lote segun WIP_OT"></span></small> {{ $wip["wip_ot"]["start_quantity"] }}
    <small>Cantidad declarada: <span class="glyphicon glyphicon-info-sign" tooltip-placement="right" tooltip="Declaraciones segun WIP_OT"></span></small> {{ $wip["wip_ot"]["quantity_completed"] }}
    <small>Restante:</small> {{ $wip["wip_ot"]["restante"] }}
@endif