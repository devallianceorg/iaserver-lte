<template>
  <section>
    <h3>Seguimiento de Lanzamientos</h3>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar OP para Seguimiento</h3>
                <div class="box-body">
                    <div class="col-lg-6">
                        <input id="_op" type="text" @keypress="validar($event)" class="form-control" v-model="model.op" :disabled="opDisabled" placeholder="ingrese op" style="text-transform: uppercase;">
                    </div>
                    <button class="btn btn-social btn-vk" @click="registrar()"><i class="fa fa-database"></i> Registrar OP</button>
                    <div class="col-lg-2">
                        <label for="chkBox" class="fa fa-lg fa-bug"></label>
                        <input id="chkBox" name="chkBox" type="checkbox" checked>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <tr v-for="op in activeOp" :key="op.id">
                            <td>{{op.op}}</td>
                            <td>{{op.modelo}}</td>
                            <td>{{op.created_at}}</td>
                            <!-- ADMIN VALIDATION -->
                            <td><button class="btn btn-xs btn-danger" @click="deleteOp(op)">Dejar de Seguir</button></td>
                            <td v-if="op.aoi == true"><label class="btn btn-xs btn-warning" >AOI</label></td>
                            <td v-if="op.quarantine == true"><button class="btn btn-xs btn-info" @click="redirectToQuarantineView(op)"><span class="fa fa-bug"></span></button></td>
                            <!-- / ADMIN VALIDATION -->
                        </tr>
                    </table>
                </div>
                <div class="box-footer"></div>
            </div>
        </div>
    </div>
  </section>
</template>

<script>
export default {
    name: 'LanzamientosHeader',
    data () {
        return {
            model: {},
            opDisabled: false,
            activeOp: [
                {
                    id:1,
                    op: 'OP-TEST4',
                    modelo: 'ModeloTest',
                    created_at: '2020-09-10',
                    aoi: true,
                    quarantine: false
                },
                {
                    id: 2,
                    op: 'OP-TEST5',
                    modelo: 'ModeloTest',
                    created_at: '2020-09-10',
                    aoi: true,
                    quarantine: true
                },
                {
                    id: 3,
                    op: 'OP-TEST6',
                    modelo: 'ModeloTest',
                    created_at: '2020-09-10',
                    aoi: false,
                    quarantine: false
                }
            ]
        }
    },
    methods: {
        validar (e) {
            console.log('op', e.key)
        },
        registrar () {},
        deleteOp (op) {
        },
        redirectToQuarantineView (op) {
        }
    }
}
</script>

<style>

</style>