<template>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Stenciles</h3>
        </div>
        <div v-if="networkError" class="callout callout-danger">
            <h4>Network error</h4>
            <p>No fue posible conectarse al servicio</p>
        </div>
        <!-- NETWORK OK-->
        <div v-else class="box-body no-padding">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th>Codigo</th>
                    <th>Ubicacion</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Lado</th>
                    <th>Grabado</th>
                    <th>Job / Serie</th>
                    <th>Cliente</th>
                    <th>PCB</th>
                    <th>Notas</th>
                    <th>Usos</th>
                    <th>Fecha de ingreso</th>
                    <td style="width: 40px;"></td>
                </tr>
                <tr v-for="item in apiFetchResponse.data">
                    <td><a :href="`/controldestencil/detalle/${item.codigo}`">{{ item.codigo }}</a></td>
                    <td v-if="item.ubicacion">{{ item.ubicacion.codigo_ubicacion}}</td>
                    <td v-else></td>
                    <td>{{ item.modelo }}</td>
                    <td>{{ item.placa }}</td>
                    <td>{{ item.lado }}</td>
                    <td>{{ item.serie }}</td>
                    <td>{{ item.job }}</td>
                    <td>{{ item.cliente }}</td>
                    <td>{{ item.pcb }}</td>
                    <td>{{ item.observaciones_count }}</td>
                    <td>{{ item.usos }}</td>
                    <td>{{ item.ingreso }}</td>
                    <td>
                        <!-- Delete -->
                        <button class="btn btn-danger btn-xs" @click="modalConfirm(item.id)"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Loading (remove the following to stop the loading)-->
        <div v-if="loading" class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
        <!-- end loading -->
    </div>
</template>

<script>
    export default {
        props: [],
        data(){
            return {
                loading: false,
                networkError: false,
                apiRoute: '',
                apiFetchResponse: {
                    data:[]
                }
            }
        },
        created:function(){
            this.apiRoute = `${this.$apiIngress}/controldestencil/v1/stencil`;
            this.apiFetch();
        },
        computed:{
        },
        watch:{
        },
        methods:{
            apiFetch() {
                let el = this;
                let route = `${this.apiRoute}`;
                el.loading = true;
                axios.get(route).then(function(response){
                    if(response.data.error) {
                        swal("Error", response.data.error, "error");
                    } else {
                        el.apiFetchResponse = response.data;
                    }
                    el.loading = false;
                }).catch(function(error) {
                    if (!error.status) {
                        el.networkError = true;
                    }
                    el.loading = false;
                });
            },
            apiDelete(id) {
                let el = this;
                let route = `${this.apiRoute}/delete/${id}`;
                axios.post(route).then(function(response){
                    if(response.data.error) {
                        swal("Error", response.data.error, "error");
                    } else {
                        swal("Registro eliminado!", {
                            icon: "success"
                        });
                        el.apiFetch();
                    }
                });
            },
            modalConfirm(id){
                swal({
                    title: "Desea eliminar este registro?",
                    text: "Esta accion no puede revertirse!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                    if (willDelete) {
                        this.apiDelete(id);
                    }
                });
            }
        }
    }
</script>
