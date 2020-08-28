<template>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Buscar stenciles</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="input-group">
                        <input v-on:keyup.enter="findByCodigo" v-model="codigo" class="form-control" placeholder="Buscar por codigo">
                        <div class="input-group-btn">
                            <button @click="findByCodigo()" class="btn btn-success"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input v-on:keyup.enter="findByKeyword" v-model="keyword" name="keyword" class="form-control" placeholder="Buscar por palabra clave">

                        <div class="input-group-btn">
                            <button @click="findByKeyword()" class="btn btn-success"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-default pull-right">
                        <i class="fa fa-save"></i> Crear nuevo stencil
                    </a>
                </div>
            </div>

        </div>
        <!-- /.box-body -->
    </div>
</template>

<script>
    export default {
        props: [],
        data(){
            return {
                codigo: '',
                keyword: '',
            }
        },
        created:function(){

        },
        methods:{
            findByCodigo: function() {
                if(!_.isEmpty(this.codigo)) {
                    this.$store.commit('filterFindByCodigo', this.codigo);
                    this.codigo = '';
                    this.keyword= '';
                }
            },
            findByKeyword: function() {
                if(!_.isEmpty(this.keyword)) {
                    this.$store.commit('filterFindByKeyword', this.keyword);
                    this.codigo = '';
                    this.keyword = '';
                }
            }
        }
    }
</script>
