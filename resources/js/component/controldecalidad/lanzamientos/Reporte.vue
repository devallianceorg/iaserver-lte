<template>
  <div class="col-10" ng-controller="lanzamientosController">
        <h1>Seguimiento de Lanzamientos</h1>
        <hr>
        @if(isAdmin()|| isCuarantineAdmin())
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrar OP para Seguimiento</h3>
                    <div class="box-body">
                        <div class="col-lg-6">
                            <input id="_op" type="text" ng-keypress="validar($event)" class="form-control" ng-model="_op" ng-disabled="opDisabled" placeholder="ingrese op" style="text-transform: uppercase;">
                        </div>
                        <button class="btn btn-social btn-vk" ng-click="registrar()"><i class="fa fa-database"></i> Registrar OP</button>
                        <div class="col-lg-2">
                            <label for="chkBox" class="fa fa-lg fa-bug"></label>
                            <input id="chkBox" name="chkBox" type="checkbox" checked>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">OP's en Seguimiento <small>(OP's que no han sido consumidas aun en otras plantas)</small> </h3>
                    <div class="box-body">
                        <table class="table table-condensed">
                            <tr>
                                <th>OP</th>
                                <th>Modelo</th>
                                <th>Fecha de Creación</th>
                            </tr>
                            <tr ng-repeat="op in activeOp">
                                <td>@{{op.op}}</td>
                                <td>@{{op.modelo}}</td>
                                <td>@{{op.created_at}}</td>
                                @if(isAdmin()|| isCuarantineAdmin())
                                    <td><button class="btn btn-xs btn-danger" ng-click="deleteOp(op)">Dejar de Seguir</button></td>
                                    <td ng-show="op.aoi == 'true'"><label class="btn btn-xs btn-warning" >AOI</label></td>
                                    <td ng-show="op.quarantine == 'true'"><button class="btn btn-xs btn-info" ng-click="redirectToQuarantineView(op)"><span class="fa fa-bug"></span></button></td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Historial de Seguimientos <small>(Cuando se registra el consumo de la primer placa de la OP a seguir)</small></h3>

                    <!-- DATE RANGE PICKER -->
                    <script type="text/javascript">
                        $(function() {
                            $('input[name="lanzamientos_fecha"]').daterangepicker({
                                locale: {
                                    format: 'DD/MM/YYYY',
                                    customRangeLabel: 'Definir rango'
                                },
                                ranges: {
                                    'Hoy': [moment(), moment()],
                                    'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                    'Ultimos 7 dias': [moment().subtract(6, 'days'), moment()],
                                    'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
                                    'Este Mes': [moment().startOf('month'), moment().endOf('month')],
                                    'Ultimo Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                },
                                autoApply: true
                            });
                        });

                        moment.locale("es");

                    </script>
                    <!-- Include Date Range Picker -->

                    {!! IAScript('assets/jquery/daterangepicker/daterangepicker.js') !!}
                    {!! IAStyle('assets/jquery/daterangepicker/daterangepicker.css') !!}

                    <div class="box-body" style="overflow-x: auto;">
                        <hr>
                        <table datatable="ng" dt-options="dtOptions" id="tabla1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">OP</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Lote</th>
                                <th class="text-center">Panel</th>
                                <th class="text-center">Semielaborado</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Fecha de Creación</th>
                                <th class="text-center">Fecha de Actualización</th>
                                <th class="text-center">Primer Evento</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="h in history">
                                <td width="10%" class="text-center">@{{h.op}}</td>
                                <td class="text-center ">@{{h.modelo}}</td>
                                <td class="text-center">@{{h.lote}}</td>
                                <td class="text-center">@{{h.panel}}</td>
                                <td width="15%" class="text-center">@{{h.semielaborado}}</td>
                                <td class="text-center">@{{h.qty}}</td>
                                <td width="15%" class="text-center">@{{h.created_at}}</td>
                                <td width="15%" class="text-center">@{{h.updated_at}}</td>
                                <td width="8%" class="text-center">
                                    {{--<button class="btn btn-xs btn-vk" ng-click="btnClick('{{url('/lanzamientos/prompt')}}','Editar Destinatario','info',d,false)">Ver</button>--}}
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
