<template>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Observaciones</h3>
        </div>
        <div v-if="networkError" class="callout callout-danger">
            <h4>Network error</h4>
            <p>No fue posible conectarse al servicio</p>
        </div>
        <div v-else class="box-footer box-comments">
            <!-- List-->
            <div v-if="apiList.data.length">
                <div class="box-comment" v-for="item in apiList.data">
                    <!-- Delete -->
                    <div class="pull-right">
                        <button class="btn btn-danger btn-xs" @click="modalConfirm(item.id)"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="comment-text">
                        <span class="username">
                            <span v-if="item.operador">{{ item.operador.name }}</span>
                            <span v-else>Desconocido</span>
                            <span class="text-muted">{{ item.fecha }} - {{ item.hora }}</span>
                        </span>
                        {{ item.texto }}
                    </div>
                </div>
            </div>
            <!-- Empty-->
            <div v-else class="box-comment">
                No hay observaciones registradas
            </div>
            <!-- Create-->
            <div>
                <input v-model="inputCreate" v-on:keyup.enter="onEnter" type="text" class="form-control input-sm" placeholder="Redacte una observacion">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['codigo'],
        data(){
            return {
                networkError: false,
                apiRoute: '',
                apiList: {
                    data:[]
                },
                inputCreate: ''
            }
        },
        created:function(){
            this.apiRoute = `${this.$apiIngress}/controldestencil/v1/observaciones`;
            this.apiListByCodigo()
        },
        computed:{
        },
        watch:{
        },
        methods:{
            apiListByCodigo() {
                let el = this;
                let route = `${this.apiRoute}/codigo/${this.codigo}`;
                axios.get(route).then(function(response){
                    if(response.data.error) {
                        swal("Error", response.data.error, "error");
                    } else {
                        el.apiList = response.data;
                    }
                }).catch(function(error) {
                    if (!error.status) {
                        el.networkError = true;
                    }
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
                        el.apiListByCodigo();
                    }
                });
            },
            apiCreate() {
                let el = this;
                let route = `${this.apiRoute}/create`;
                let params = {
                    'codigo' : this.codigo,
                    'texto' : this.inputCreate,
                };

                axios.post(route,params).then(function(response){
                    if(response.data.error) {
                        swal("Error", response.data.error, "error");
                    } else {
                        swal("Registro creado!", {
                            icon: "success"
                        });
                        el.apiListByCodigo();
                        el.inputCreate = '';
                    }
                });
            },
            onEnter() {
                this.apiCreate();
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
