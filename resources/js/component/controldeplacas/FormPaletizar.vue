<template>
  <span>
    <button class="btn btn-default btn-xs" @click="show()" ><i class="fa fa-barcode"></i> Paletizar</button>
    
    <modal name="form-paletizar" :height="550" :width="1024" :scrollable="true" :clickToClose="false">
      <div class="box box-solid">
        <div class="box-header">
          <div class="pull-right" >
            <button class="close" @click="hide()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <p class="login-box-msg" style="padding-bottom:0px;">Paletizar</p>
        </div>
        <div class="box-body">
          <div class="row">
            <!-- TABLA -->
            <div class="col-md-6">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Palet</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="text-center" style="width:30px">Barcode</th>
                        <th class="text-center" style="width:30px">Cantidad</th>
                        <th class="text-center" style="width:300px">Declarado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-center" v-for="item in palletList" :key="item.id">
                        <td>{{ item.stk_barcode }}</td>
                        <td>{{ item.qty }}</td>
                        <td>
                          <span :class="item.status ? 'fa fa-thumbs-o-up' : 'fa fa-clock-o'"></span>
                        </td>
                      </tr>
                    </tbody>
                    
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- / TABLA -->
            <div class="col-md-6">
              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="form-group">
                    <label>Stocker Barcode:</label>
                    <label> <input type="checkbox"> Remover </label>
                    <input type="text" name="stk_barcode" ref="stk_barcode" focus class="form-control" @keydown="onKeyDown" v-model="form.stk_barcode">
                  </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                  <label>Destino:</label>
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
                  <textarea  name="panel_detail" rows="8" readonly class="form-control" v-model="form.palet_detail" />
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group">
                  <textarea  name="errors" rows="6" readonly class="form-control" style="background-color:#222;" v-model="form.errors" />
                </div>
              </div>
              <div class="box-footer col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <button type="submit" class="btn btn-danger" @click="cancel()" :disabled="palletizeDisabled">Descontar placas</button>
                <button type="submit" class="btn btn-success pull-right" @click="send()" :disabled="palletizeDisabled">Confirmar Carga</button>
              </div>
            </div>
          </div>
          
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
      palletizeDisabled:true,
      barcodeDisabled:true,
      qtyDeclarar:0,
      barcodeDeclarar:'',
      messageDeclared:'',
      form:{},
      palletList:[]
    }
  },
  created:function(){
    window.addEventListener('keydown', (e) => {
      if (e.key == 'Enter' && this.form.stk_barcode !== '') {
        this.palletList.push({
          stk_barcode: this.form.stk_barcode,
          qty:1080,
          status:false
        })
        this.form = {}
      }
    });
  },
  mounted:function(){
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
      this.$modal.show('form-paletizar');
    },
    hide () {
      this.$modal.hide('form-paletizar');
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
    },
    onKeyDown(){

    }
  }
}
</script>

<style>

</style>