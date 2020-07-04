<template>
  <div class="col-lg-12 col-md-12 col-sm-12" v-if="userLogged">
      <div class="box box-info">
          <div class="box-header with-border">
              <div class="pull-right">
                  <button class="btn bg-orange btn-flat">{{ userInfo.FIRST_NAME }} {{ userInfo.LAST_NAME }}</button>
              </div>
              <h3 class="box-title">Carrito <span class="fa fa-shopping-cart"></span></h3>
          </div>
          <div class="box-body">
              <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="box box-success">
                          <div class="box-header with-border text-center">
                              <h3 class="box-title ">Egresos</h3>
                          </div>
                          <div class="box-body">
                              <table class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                      <th>Modelo</th>
                                      <th>Lote</th>
                                      <th>Código</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <!-- <tr ng-repeat="add in listToAdd">
                                      <td>@{{ add.modelo }}</td>
                                      <td>@{{ add.lote }}</td>
                                      <td>@{{ add.barcode }}</td>
                                  </tr> -->
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="box box-warning">
                          <div class="box-header with-border text-center">
                              <h3 class="box-title">Devoluciones</h3>
                          </div>
                          <div class="box-body">
                              <table class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                      <th>Modelo</th>
                                      <th>Lote</th>
                                      <th>Código</th>
                                      <th>Línea</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <!-- <tr ng-repeat="return in listToReturn">
                                      <td>@{{ return.modelo }}</td>
                                      <td>@{{ return.lote }}</td>
                                      <td>@{{ return.barcode }}</td>
                                      <td>@{{ return.linea }}</td>
                                  </tr> -->
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>


          </div>
      </div>

  </div>
</template>

<script>
export default {
  data(){
    return {
      userLogged:true,
      userInfo:{
        FIRST_NAME:"Diego",
        LAST_NAME:"Maidana"
      }

    }
  },
  created:function(){
  },
  computed:{

  },
  watch:{

  },
  methods:{
  
  }

}
</script>

<style>

</style>