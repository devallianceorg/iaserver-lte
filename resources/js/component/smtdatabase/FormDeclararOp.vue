<template>
  <span>
    <span><button class="btn btn-xs btn-success" tooltip="Declarar OPs" @click="show()" ><span class="fa fa-check-square-o"></span> Declarar</button></span>
    
    <modal name="form-declarar" height="auto" :width="300" :scrollable="true" :clickToClose="false">
      <div class="box box-solid">
        <div class="box-header">
          <div class="pull-right" >
            <button class="close" @click="hide()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <p class="login-box-msg" style="padding-bottom:0px;">Declarar Producto</p>
        </div>
        <div class="box-body">
          <div v-if="!_.isNaN(wip) && wip.active">
            <!-- REVISAR -->
            <small>Cantidad de Lote</small> {{ wip.wip_ot.start_quantity }}
            <small>Declarado</small> {{ wip.wip_ot.quantity_completed }}
            <small>Restante</small> {{ wip.wip_ot.restante }}
            <small>Pendiente</small> {{ wip.wip_ot.quantity_completed }}
            <div class="form-group">
              <input type="number" name="cantidad" min="0" max="5000" v-model="qtyDeclarar" class="form-control focus" placeholder="Ingresar cantidad"/>
            </div>
            <div class="form-group">
              <input type="text" name="barcode" v-model="barcodeDeclarar" class="form-control" placeholder="Barcode" :disabled="barcodeDisabled" />
            </div>
          </div>
          <div v-else class="alert alert-danger">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            <span class="sr-only">Error:</span>
            La OP solicitada fue cerrada!
          </div>
        </div>
        <div class="box-footer">
          <div v-if="!_.isNaN(wip) && wip.active">
            <input type="hidden" name="op" class="form-control" v-model="wip.wip_ot.nro_op"/>
            <input type="hidden" name="codigo_producto" class="form-control" v-model="wip.wip_ot.codigo_producto" />
            <button type="submit" class="btn btn-success btn-block" @click="declare()" :disabled="declareDisabled">Declarar</button>
          </div>
        </div>
      </div>
    </modal>
  </span>
</template>

<script>
export default {
  props: ['wip'],
  data(){
    return {
      declareDisabled:true,
      barcodeDisabled:true,
      qtyDeclarar:0,
      barcodeDeclarar:'',
      messageDeclared:'',
    }
  },
  created:function(){
  },
  computed:{

  },
  watch:{
    qtyDeclarar(newValue){
      console.log(newValue)
      if(newValue == 1){
        this.barcodeDisabled = false
      }else{
        this.barcodeDisabled = true
      }

      if(newValue > 0){
        this.declareDisabled = false
      }else{
        this.declareDisabled = true
      }
    }

  },
  methods:{
    show () {
      this.$modal.show('form-declarar');
    },
    hide () {
      this.$modal.hide('form-declarar');
    },
    declare(){
      if(this.qtyDeclarar > 1){
        this.messageDeclared = this.qtyDeclarar+" Números de serie Declarados"
      }else{
        this.messageDeclared = this.qtyDeclarar+" Número de serie Declarado"

      }
      swal({
        title: "Exito!",
        text: this.messageDeclared,
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