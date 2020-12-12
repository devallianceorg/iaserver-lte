<template>
  <div class="col-10">
      <LanzamientosHeader />
        <div class="col-lg-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Historial de Seguimientos <small>(Cuando se registra el consumo de la primer placa de la OP a seguir)</small></h3>
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
                            <tr v-for="h in history" :key="h.id">
                                <td width="10%" class="text-center">{{h.op}}</td>
                                <td class="text-center ">{{h.modelo}}</td>
                                <td class="text-center">{{h.lote}}</td>
                                <td class="text-center">{{h.panel}}</td>
                                <td width="15%" class="text-center">{{h.semielaborado}}</td>
                                <td class="text-center">{{h.qty}}</td>
                                <td width="15%" class="text-center">{{h.created_at}}</td>
                                <td width="15%" class="text-center">{{h.updated_at}}</td>
                                <td width="8%" class="text-center">
                                    <button class="btn btn-xs btn-vk">Ver</button>
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
import LanzamientosHeader from './Header'
export default {
    components: { LanzamientosHeader },
    data () {
        return {
            history: [
                {
                    id: 1,
                    op: 'OP-TEST',
                    modelo: 'ModeloTest',
                    lote: 'L101',
                    panel: 'MAI',
                    semielaborado: '4-651-MAITV0001',
                    qty: 2500,
                    created_at: '2020-09-12',
                    updated_at: '2020-09-12'
                },
                {
                    id: 2,
                    op: 'OP-TEST2',
                    modelo: 'ModeloTest',
                    lote: 'L101',
                    panel: 'POW',
                    semielaborado: '4-651-POWTV0001',
                    qty: 2500,
                    created_at: '2020-09-12',
                    updated_at: '2020-09-12'
                },
                {
                    id: 3,
                    op: 'OP-TEST3',
                    modelo: 'ModeloTest',
                    lote: 'L101',
                    panel: 'SIR',
                    semielaborado: '4-651-SIRTV0001',
                    qty: 2500,
                    created_at: '2020-09-12',
                    updated_at: '2020-09-12'
                }
            ]
        }
    }
}
</script>

<style>

</style>
