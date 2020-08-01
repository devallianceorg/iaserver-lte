<template>
  <section>
    <h3 v-if="op && op !== ''">No especifico una OP</h3>
    @if($wip->wip_ot)
        <form v-if="wip.wip_ot" class="form-horizontal" role="form" method="post" action="{{ route('aoicollector.prod.infoop.submit') }}">
            <input type="hidden"  name="op" value="{{ $op }}">
            <input type="hidden" name="aoibarcode" value="{{ $aoibarcode }}">

            <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <blockquote>
                    <h3>
                        {{ $op }}
                    </h3>
                    <small>Estado:</small> <span style="padding: 5px;" class="label label-{{ $wip->active ? 'success' : 'danger' }}">{{ $wip->active ? 'ACTIVA' : 'CERRADA' }}</span>

                    <small>Modelo:</small>
                    @if(isset($smt))
                        {{ $smt->modelo }} - {{ $smt->panel }} - {{ $smt->lote }}
                    @else
                        <span class="label label-danger">No hay datos en SMTDatabase</span>
                    @endif

                    <small>Semielaborado:</small> {{ $wip->wip_ot->codigo_producto }}

                    @if($wip->active)

                        @if(preg_match("/-B$/", $op))
                            <small>Cantidad de lote: <span class="glyphicon glyphicon-info-sign" tooltip-placement="right" tooltip="Cantidad de lote segun WIP_OT"></span></small> {{ $wip->wip_ot->start_quantity }}
                            <small>Placas inspeccionadas: <span class="glyphicon glyphicon-info-sign" tooltip-placement="right" tooltip="Declaraciones segun WIP_OT"></span></small> {{ $smt->prod_aoi}}
                            <small>Placas restante:</small> {{ $wip->wip_ot->start_quantity -  $smt->prod_aoi }}
                        @else
                            <small>Cantidad de lote: <span class="glyphicon glyphicon-info-sign" tooltip-placement="right" tooltip="Cantidad de lote segun WIP_OT"></span></small> {{ $wip->wip_ot->start_quantity }}
                            <small>Cantidad declarada: <span class="glyphicon glyphicon-info-sign" tooltip-placement="right" tooltip="Declaraciones segun WIP_OT"></span></small> {{ $wip->wip_ot->quantity_completed }}
                            <small>Restante:</small> {{ $wip->wip_ot->restante }}
                        @endif

                    @endif

                </blockquote>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">

                <blockquote>
                    <h4>Seleccionar puesto</h4>
                    @if(isset($routeop) && count($routeop)>0)
                        <div class="form-group">
                            <select class="form-control" name="id_route_op" ng-model="id_route_op" style="font-size:18px;">
                                <option value="">- Elegir una opcion -</option>
                                @foreach($routeop as $route)
                                    <option value="{{ $route->id }}">
                                        {{ $route->name }} -
                                        @if($route->declare)
                                            Declara
                                            @else
                                            No declara
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="callout callout-danger">
                            <p>No existen rutas</p>
                            <small style="color:#FFF;">Solicitar a un programador que genere las rutas de produccion</small>
                        </div>
                        @if(isAdmin())
                            <a href="{{ url("aoicollector/prod/routeop/?op=$op") }}" target="_blank" class="btn btn-xs btn-block btn-default">Crear ruta para {{ $op }}</a>
                        @endif
                    @endif
                </blockquote>

                <blockquote>
                    <h4>Seleccionar modo</h4>
                        <div class="form-group" >
                            <select class="form-control" name="id_modo" ng-model="id_modo" style="font-size:18px;">
                                <option value="0">AOI</option>
                                <option value="1">MANUAL</option>
                                <option value="3">COGISCAN->TH</option>
                            </select>
                        </div>
                </blockquote>
            </div>
        </div>
            <input ng-if="id_route_op && id_modo" class="form-control btn btn-block btn-info"  type="submit" value="Usar esta configuracion de OP">
        </form>
    @else
        <div class="callout callout-danger">
            <h4>{{ $op }}</h4>
            <p>No fue localizada en la interfáz, ¿Está seguro que la OP es la correcta?</p>
        </div>
    @endif

@endif
  </section>
    

</template>

<script>
export default {

}
</script>

<style>

</style>