<div class="well" style="height: 70px;">
    <div class="row">
        <div class="col-sm-4 col-md-6 col-lg-6">
            @if(Request::get('search'))
                <a href="{{ route('memorias.index') }}" class="btn btn-info">Ver cartelera completa</a>
            @endif
        </div>

        <div class="col-sm-4 col-md-3 col-lg-3">
            <!-- BUSQUEDA EN TRAZABILIDAD-->
            <form method="POST" action="{{ route('ordendetrabajo.find.op') }}" class="pull-right">
              @csrf
              <div class="input-group">
                <input type="text" name="op" class="form-control" placeholder="OP" value="{{ Request::get('op')  }}"/>
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> Buscar en Traza</button>
                </span>
              </div>
            </form>
            <!-- END BUSQUEDA -->
        </div>

        <div class="col-sm-4 col-md-3 col-lg-3">
            <!-- BUSQUEDA EN PLAN -->
            <form method="POST" action="{{ route('memorias.search') }}" class="pull-right">
              @csrf  
              <div class="input-group" >
                <input type="text" name="search" class="form-control" placeholder="Modelo/Op" value="" ng-model="buscador" />
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> Buscar en plan</button>
                </span>
              </div>
            </form>
            <!-- END BUSQUEDA -->
        </div>
    </div>
  </div>