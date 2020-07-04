<template>
  <span>  
    <modal name="form-filtro" height="auto" :width="400" :scrollable="true" :clickToClose="false">
      <div class="box box-solid">
        <div class="box-header">
          <div class="pull-right" >
            <button class="close" @click="hide()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <p class="login-box-msg" style="padding-bottom:0px;">Filtrar</p>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                <label>Modelo</label>
                <select class="form-control">
                  <option>ModeloTest</option>
                  <option>ModeloTest2</option>
                  <option>ModeloTest3</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
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
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                <label>Lote</label>
                <select class="form-control">
                  <option>L101</option>
                  <option>L102</option>
                  <option>L103</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                <label>Estado</label>
                <select class="form-control">
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                <label>Placa</label>
                <select class="form-control">
                  <option>MAI</option>
                  <option>POW</option>
                  <option>SIR</option>
                  <option>CTR</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                <label>EBS</label>
                <select class="form-control">
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                <label>Desde:</label>
                <div class="input-group">
                  <input type="date" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                <label>Hasta:</label>
                <div class="input-group">
                  <input type="date" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-default" @click="filter()">Filtrar</button>
            <button type="submit" class="btn btn-default pull-right" @click="clearFields()">Limpiar</button>
        </div>
      </div>
    </modal>
  </span>
</template>

<script>
//Date range picker
export default {
  name:'form-filtro',
  props: [],
  data(){
    return {
      codigo:''
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
    // show () {
    //   this.$modal.show('form-enviar-op');
    // },
    filter () {

    },
    clearFields () {

    },
    hide () {
      this.$modal.hide('form-filtro');
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