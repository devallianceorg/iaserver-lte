<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="box box-default">
          <div class="box-body">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                  <label>Impresora</label>
                  <select class="form-control" disabled>
                    <option>Oficina</option>
                    <option>Nave2</option>
                    <option>Printer3</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                  <label>Tipo de Consumible</label>
                  <select class="form-control">
                    <option>Pasta</option>
                    <option>Pegamento</option>
                    <option>Rollo de Etiquetas</option>
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
                  <label>Cantidad</label>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                      <input type="number" min="0" name="cantidad" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <button class="btn btn-primary btn-block">Imprimir</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="box box-default">
          <div class="box-header with-border">
              <h3 class="box-title">Últimas Impresiones<small>(últimas 10)</small></h3>
              <div class="box-body">
                  <table id="tabla1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>Consumible</th>
                          <th>CÓDIGO</th>
                          <th>Fecha</th>
                      </tr>
                      </thead>
                      <tbody>
                      <!-- <tr ng-repeat="egreso in egresos">
                          <td>@{{ egreso.modelo }}</td>
                          <td>@{{ egreso.lote }}</td>
                          <td>@{{ egreso.codigo }}</td>
                          <td>@{{ egreso.operador }}</td>
                          <td>@{{ egreso.linea }}</td>
                          <td>@{{ egreso.fecha }}</td>
                      </tr> -->
                      </tbody>
                  </table>
              </div>
              <div class="box-footer"></div>
          </div>
      </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>