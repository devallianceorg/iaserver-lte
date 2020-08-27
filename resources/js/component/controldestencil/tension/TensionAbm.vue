<template>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tension</h3>
        </div>
        <div class="box-footer box-comments">
            <!-- List-->
            <div v-if="tensionList.data.length">
                <div class="box-comment" v-for="item in tensionList.data">
                    <!-- Delete -->
                    <div class="pull-right">
                        <button class="btn btn-danger btn-xs" @click="modalConfirm(item.id)"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="comment-text">
                  <span class="username">
                    {{ item.operador.name }}
                    <span class="text-muted">{{ item.fecha }}</span>
                  </span>
                        {{ item.tension }}
                    </div>
                </div>
            </div>
            <!-- Empty-->
            <div v-else class="box-comment">
                No hay registros de tension
            </div>
            <!-- Create-->
            <div>
                <input v-model="newTension" v-on:keyup.enter="onEnter" type="text" class="form-control input-sm" placeholder="Registrar tension actual">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['codigo'],
        data(){
            return {
                apiRoute: '',
                tensionList: {
                    data:[]
                },
                newTension: '',
            }
        },
        created:function(){
            this.apiRoute = `${this.$apiIngress}/controldestencil/v1/tension`;
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
                        el.tensionList = response.data;
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
                    'tension' : this.newTension,
                };

                axios.post(route,params).then(function(response){
                    if(response.data.error) {
                        swal("Error", response.data.error, "error");
                    } else {
                        swal("Registro creado!", {
                            icon: "success"
                        });
                        el.apiListByCodigo();
                        el.newTension = '';
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
