<template>
  <span>
    <button class="btn btn-default btn-xs" @click="show()" ><i class="fa fa-download"></i> Recepcionar</button>

    <modal name="form-recepcionar" height="auto" :width="300" :scrollable="true" :clickToClose="false">
      <div class="box box-solid">
        <div class="box-header">
          <div class="pull-right" >
            <button class="close" @click="hide()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <p class="login-box-msg" style="padding-bottom:0px;">Recepcionar</p>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Ingrese código a recepcionar:</label>
            <input type="text" name="codigo" class="form-control" v-model="codigo">
          </div>
        </div>
      </div>
    </modal>
  </span>
</template>

<script>
export default {
  name:'form-recepcionar',
  props: [],
  data(){
    return {
      codigo:''
    }
  },
  created:function(){
    window.addEventListener('keydown', (e) => {
      if (e.key == 'Enter' && this.codigo !== '') {
        this.codigo = ''
        this.$modal.hide('form-recepcionar')
      }
    });
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
      this.$modal.show('form-recepcionar');
    },
    hide () {
      this.$modal.hide('form-recepcionar');
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