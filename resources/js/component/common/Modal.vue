<template>
  <div class="modal">
    <div class="container">
      <div class="modal__title">Direction</div>
      <p>Get a direction with your favourite apps</p>
      <a href="#" class="btn gmaps">
        <img src="https://img.icons8.com/color/420/google-maps.png"> Google Maps
      </a>
      <a href="#" class="btn waze">
        <img src="https://img.icons8.com/color/420/waze.png"> Waze
      </a>
      <button class="mt-3 border-b border-teal font-semibold">Close</button>
    </div>
  </div>

<!-- <div class="modal fade" id="modalInspeccionVisual" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar inspeccion visual</h4>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-xs-6">
                        <input class="form-control" name="panelbarcode" placeholder="Codigo de placa" ng-model="visualPanelBarcode"/>
                    </div>

                    <div class="col-xs-6">
                        <select class="form-control select2" style="width: 100%;" ng-show="visualPanelBarcode">
                            <option>- Seleccionar posicion -</option>
                            <?php
                                $posiciones =  \IAServer\Http\Controllers\SMTDatabase\Model\Lotes::select('posicion')
                                        ->where('id_ingenieria',1661390)
                                        ->where('logop','MAI')
                                        ->get();
                            ?>
                            @foreach($posiciones as $item)
                                <option value="{{ $item->posicion }}">{{ $item->posicion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
  </div> -->
</template>

<script>
export default {
  props: {
    component: {
      type: String,
      required: true
    },
    dialog: {
      type: Boolean,
      default: false
    },
    width: {
      type: Number,
      default: 600
    },
    height: {
      type: Number,
      default: 400
    }
  }

}
</script>

<style>
.modal {
    background-color: rgba(0, 0, 0, 0.7);
}
</style>