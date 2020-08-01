<div class="col-md-12" style="margin:10px 0; padding:0;">
  <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab">Generar Etiquetas</a></li>
      <li><a href="#tab_2" data-toggle="tab">Stock de Consumibles</a></li>
      {{-- <li><a href="#tab_3" data-toggle="tab">Cargar Materiales</a></li> --}}
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1" >
        {{-- COMPONENTE DE GENERACIÓN DE ETIQUETAS --}}
        <controldeconsumibles-administrar-impresion />
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">
        {{-- COMPONENTE DE STOCK DISPONIBLE --}}
        acá va el componente de stock disponible
      </div>
    </div>
    <!-- /.tab-content -->
  </div>
  <!-- nav-tabs-custom -->
</div>
<!-- /.col -->