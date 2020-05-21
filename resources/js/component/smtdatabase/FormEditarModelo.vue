<template>
  <span v-if="smt.op">
    <span><button class="btn btn-xs btn-info" tooltip="Editar Información de Modelo" @click="show()" ><span class="fa fa-pencil"></span> Editar</button></span>
    
    <modal name="form-editar-modelo" height="auto" :width="350" :scrollable="true" :clickToClose="false">
      <div class="box box-solid">
          <div class="box-header">
            <div class="pull-right" >
              <button class="close" @click="hide()">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <p class="login-box-msg" style="padding-bottom:0px;">Estás editando <strong>{{ smt.op }}</strong></p>
            <div class="login-box-msg" style="margin-top:5px;font-size:14px;">{{ smt.semielaborado }}</div>
          </div>
          <!-- /.box-header -->

          <div class="box-body">
            <div class="row" style="padding:0 30px 0 30px;">
              <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="form-group">
                    <label>Modelo:</label>
                    <input type="text" name="modelo" class="form-control" v-model="smt.modelo">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="form-group">
                    <label>Semielaborado:</label>
                    <input type="text" name="semielaborado" class="form-control" v-model="smt.semielaborado">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                  <div class="form-group">
                    <label>Lote:</label>
                    <input type="text" name="lote" class="form-control" v-model="smt.lote">
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                  <div class="form-group">
                    <label>Cantidad:</label>
                    <input type="text" name="qty" class="form-control" v-model="smt.qty">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                  <div class="form-group">
                    <label>Panel:</label>
                    <input type="text" name="panel" class="form-control" v-model="smt.panel">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <input type="hidden" name="op" class="form-control" v-model="smt.op"/>
            <!-- <input type="hidden" name="codigo_producto" class="form-control" v-model="wipInfo.wip_ot.codigo_producto"/> -->
            <button type="button" class="btn btn-success btn-block" @click="save()">Guardar Cambios</button>
          </div>
      </div>
    </modal>
  </span>

  <div v-else class="alert alert-danger">
      <span class="glyphicon glyphicon-exclamation-sign"></span>
      <span class="sr-only">Error:</span>
      El modelo No se encuentra en SMTDataBase!
  </div>
</template>

<script>
export default {
  props: ['smt'],
  data(){
    return {
    }
  },
  created:function(){
  },
  computed:{

  },
  watch:{

  },
  methods:{
    show () {
    this.$modal.show('form-editar-modelo');
    },
    hide () {
      this.$modal.hide('form-editar-modelo');
    },
    save(){
      
      swal({
        title: "Exito!",
        text: "Modelo en SMTDatabase Actualizado!",
        icon: "success",
        button: "Aceptar",
      }).then(()=>{
        this.hide()
        location.reload()
      });
    }
  }
}
</script>

<style>

</style>