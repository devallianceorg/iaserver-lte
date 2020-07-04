<template>
  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="box box-default">
        <div class="box-header with-border">

            <h3 class="box-title">Egresos del día de la fecha <small>(últimos 10)</small></h3>
            <div class="box-body">
                <table id="tabla1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Lote</th>
                        <th>Código</th>
                        <th>Operador</th>
                        <th>Línea</th>
                        <th>Usuario</th>
                        <th>Fecha de Egreso</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- <tr ng-repeat="egreso in egresos">
                        <td>@{{ egreso.modelo }}</td>
                        <td>@{{ egreso.lote }}</td>
                        <td>@{{ egreso.codigo }}</td>
                        <td>@{{ egreso.operador }}</td>
                        <td>@{{ egreso.linea }}</td>
                        <td>@{{ egreso.usuario }}</td>
                        <td>@{{ egreso.fecha }}</td>
                    </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
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
  
  }

}
</script>

<style>



</style>