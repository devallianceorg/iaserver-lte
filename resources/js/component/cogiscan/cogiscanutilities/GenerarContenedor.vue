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
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <label for="radio1">Tamaño</label>
                    <div class="form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios3" id="optionsRadios1" value="option1" checked>
                          Grande
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios3" id="optionsRadios2" value="option2">
                          Chica
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <label for="radio1">Resolución</label>
                    <div class="form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios4" id="optionsRadios3" value="option3" checked>
                          300dpi
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios4" id="optionsRadios3" value="option3">
                          200dpi
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
                  <label>Tipo de Elemento</label>
                  <select class="form-control">
                    <option>REEL</option>
                    <option>TRAY</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                  <label>Número de Parte</label>
                  <input type="text" name="lpn" class="form-control">
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
                <button class="btn btn-primary btn-block">Generar Contenedor</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="box box-default">
          <div class="box-header with-border">

              <h3 class="box-title">Últimas Generaciones de Contenedor <small>(últimas 10)</small></h3>
              <div class="box-body">
                  <table id="tabla1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>Fecha</th>
                          <th>Código</th>
                          <th>Contenedor</th>
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
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>