<template>
  <section @keyup.space="onKeyUp">
    <nav class="navbar navbar-default" style="padding-bottom:5px;margin-bottom:1px;" role="navigation">
      <div class="navbar-form">
          <div class="navbar-left">

              <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" @click="promptAoiSet()">
                      <span ng-show="aoiService.produccion.linea">Linea <b>{{ aoiService.produccion.linea  }}</b> - <b>{{ aoiService.produccion.barcode  }}</b></span>
                      <span ng-hide="aoiService.produccion.linea">Seleccionar linea</span>
                  </button>
                  <!-- @if(isAdmin()) ADMIN para despues -->
                  
                      <button type="button" class="btn btn-primary active dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu" style="height: 350px;width:250px; overflow: auto;">
                          <!-- @foreach(\IAServer\Http\Controllers\Aoicollector\Model\Produccion::allBarcode() as $produccion)
                              <li>
                                  <a href="javascript:;" ng-click="restartAoiData('{{ $produccion->barcode }}')">{{ $produccion->linea }}
                                      <span class="pull-right badge bg-blue">{{ $produccion->barcode }}</span>
                                  </a>
                              </li>
                          @endforeach -->
                          <li>
                              <a href="">
                                  SMD 2
                                  <span class="pull-right badge bg-blue">VTRNS6101</span>
                              </a>
                          </li>
                          <li>
                              <a href="">
                                  SMD 3
                                  <span class="pull-right badge bg-blue">VTRNS6103</span>
                              </a>
                          </li>
                          <li>
                              <a href="">
                                  SMD 5
                                  <span class="pull-right badge bg-blue">VTRNS6105</span>
                              </a>
                          </li>
                          <li>
                              <a href="">
                                  SMD20
                                  <span class="pull-right badge bg-blue">VTS0000</span>
                              </a>
                          </li>
                      </ul>
                  <!-- @endif ADMIN -->
              </div>

              <a href="#" class="btn bg-purple btn-sm" v-if="inspectorService.id" >
                Inspector:  <b>{{ inspectorService.fullName }}</b>
              </a>

              <a href="#" class="btn bg-navy btn-sm" v-if="inspectorService.id" data-toggle="modal" data-target="#modalInspeccionVisual">
                  Inspeccion visual
              </a>

              <div class="btn-group">
                  <div class="btn-group" v-if="aoiService.produccion.op && inspectorService.id" >
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                          Stocker <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                          <!-- <li>
                              <a href="javascript:;" v-if="promptStockerSet('{{ route('iaserver.forms.prompt',['holder'=>'Ingresar codigo de stocker']) }}')"><span class="glyphicon glyphicon-th-large"></span> Asignar <small style="color:#6b6b6b;">(F3)</small></a>
                          </li>
                          <li>
                              <a href="javascript:;" ng-click="promptStockerReset('{{ route('iaserver.forms.prompt',['holder'=>'Ingresar codigo de stocker']) }}')"><span class="glyphicon glyphicon-refresh"></span> Liberar</a>
                          </li>
                          <li class="divider"></li>
                          <li>
                              <a href="javascript:;" ng-click="promptStockerAddPanel('{{ route('iaserver.forms.prompt',['holder'=>'Ingresar codigo de panel']) }}')"><span class="glyphicon glyphicon-download-alt"></span> Relacionar panel <small style="color:#6b6b6b;">(F4)</small></a>
                          </li>
                          <li>
                              <a href="javascript:;" ng-click="promptStockerRemovePanel('{{ route('iaserver.forms.prompt',['holder'=>'Ingresar codigo de panel']) }}')"><span class="glyphicon glyphicon-remove"></span> Remover panel <small style="color:#6b6b6b;">(F9)</small></a>
                          </li> -->
                          <li>
                              <!-- La asignación tambien hace la liberación de stocker automáticamente -->
                              <a href="">Asignar</a>
                          </li>
                          <li>
                              <a href="">Relacionar Panel</a>
                          </li>
                          <li>
                              <a href="">Remover Panel</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>

          <div class="navbar-left" v-if="inspectorService.id">
              <table><tbody><tr>
                      <td>
                          <h4> &nbsp;&nbsp; Declaracion: </h4>
                      </td>
                      <td>
                          <input type="text" class="form-control" placeholder="Ingrese OP" v-model="parent.choosedOp" @keypress="btnFormSelectOp()" />
                      </td>
                      <td style="padding-left:10px;">
                          <div v-if="btnFormSelectOpProccessing">
                              <button v-if="parent.choosedOp"  type="button" class="btn btn-default btn-sm animate-show">
                                  <!-- @include('aoicollector.inspection.partial.loader_mini',[
                                      'style'=>'height:20px'
                                  ]) -->
                              </button>
                          </div>
                          <div v-else>
                              <button v-if="parent.choosedOp" @click="btnFormSelectOp()" type="button" class="btn btn-success btn-sm animate-show">
                                  Informacion de OP
                              </button>
                          </div>
                      </td>
                  </tr></tbody></table>
          </div>

          <div class="navbar-right" style="padding-right:15px;">
              <!-- <a v-if="aoiService.produccion.op && inspectorService.id" href="{{ url('aoicollector/prod/removeop') }}/@{{ aoiService.produccion.barcode }}" class="btn btn-danger">Remover op</a> -->
              <a v-if="aoiService.produccion.op && inspectorService.id" href="" class="btn btn-sm btn-danger">Remover op</a>
          </div>
      </div>
  </nav>

  <!-- Modal -->
  
  </section>
</template>

<script>
export default {
    created () {
        window.addEventListener("keypress", e => {
            this.onKeyUp(e)
        });
    },
    data () {
        return {
            btnFormSelectOpProccessing: false,
            parent: {
                choosedOp: ''
            },
            inspectorService: {
                id: 1,
                fullName: 'Diego Maidana'
            },
            aoiService: {
                produccion: {
                    op: 'OP-TEST'
                }
            }

        }
    },
    methods: {
        btnFormSelectOp () {
            // '{{ url('aoicollector/prod/infoop') }}/'+$parent.choosedOp+'/'+aoiService.produccion.barcode
        },
        promptAoiSet () {
            // '{{ route('iaserver.forms.prompt',['holder'=>'Ingresar codigo de aoi']) }}'
        },
        onKeyUp (e) {
            console.log('Key pressed', )
            let key = String.fromCharCode(e.keyCode)
            if(key === 'd') {
                if(this.inspectorService.id === 1) {
                    this.inspectorService = {}
                } else {
                    this.inspectorService = {
                        id: 1,
                        fullName: 'Diego Maidana'
                    }
                }
            }
        }
    }

}
</script>

<style>

</style>