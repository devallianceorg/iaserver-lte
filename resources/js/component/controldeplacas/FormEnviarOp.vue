<template>
  <span>
    <button class="btn btn-default btn-xs" @click="show()" ><i class="fa fa-calculator"></i> Enviar Op</button>
    
    <modal name="form-enviar-op" height="auto" :width="400" :scrollable="true" :clickToClose="false">
      <div class="box box-solid">
        <div class="box-header">
          <div class="pull-right" >
            <button class="close" @click="hide()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <p class="login-box-msg" style="padding-bottom:0px;">Enviar OP</p>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                    <label>OP:</label>
                    <input type="text" name="op" class="form-control" v-model="form.op">
                  </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                    <label>Cantidad:</label>
                    <input type="number" min="1" max="50000" name="cantidad" class="form-control" v-model="form.cantidad">
                  </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="form-group">
                <label>Destino</label>
                <select class="form-control">
                  <option>Almacén</option>
                  <option>Planta 3</option>
                  <option>Planta 4</option>
                  <option>Planta 5</option>
                  <option>Planta 6</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="form-group">
                <textarea  name="ebs_response" rows="7" readonly class="form-control" v-model="form.ebs_response" />
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success btn-block" @click="send()" :disabled="sendDisabled">Enviar OP</button>
        </div>
      </div>
    </modal>
  </span>
</template>

<script>
export default {
  props: [],
  data(){
    return {
      sendDisabled:true,
      barcodeDisabled:true,
      qtyDeclarar:0,
      barcodeDeclarar:'',
      messageDeclared:'',
      form:{ebs_response:'Ebs response status...'}
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
      this.$modal.show('form-enviar-op');
    },
    hide () {
      this.$modal.hide('form-enviar-op');
    },
    send(){
      if(this.qtyDeclarar > 1){
        this.messageDeclared = this.qtyDeclarar+" Productos registrados"
      }else{
        this.messageDeclared = this.qtyDeclarar+" Producto registrado"

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