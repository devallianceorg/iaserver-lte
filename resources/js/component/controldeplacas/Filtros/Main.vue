<template>
  <span>
    <div class="btn-group">
      <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-filter"></i> Filtro <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a href="#" @click="showForm('nuevo')">Nuevo</a></li>
        <li><a href="#" @click="showForm('codigo')">Filtrar Código</a></li>
        <li class="divider"></li>
        <li><a href="">Quitar Filtro</a></li>
      </ul>
    </div>
    <form-codigo/>
    <form-filtro/>
  </span>
</template>

<script>
import FormCodigo from './FormCodigo'
import FormFiltro from './FormFiltro'
export default {
  components: { FormCodigo, FormFiltro },
  props: [],
  data(){
    return {
      showFormCodigo:false,
      showFormNuevo:false,
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
    showForm (form) {
      console.log('mostrando form codigo')
      if(form === 'codigo'){
        this.showFormCodigo = true
        this.$modal.show('form-codigo');
      }else if ( form === 'nuevo'){
        this.showFormNuevo = true
        this.$modal.show('form-filtro');
      }
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