<div class="well" style="height: 110px;">
    <div class="row">
        <!-- BUSQUEDA -->
        <div class="col-sm-4">
            <form method="POST" action="{{ route('ordendetrabajo.find.op') }}" >
                @csrf
                <span style="color:#111;opacity:.65;">Información de OP</span>
                <div class="input-group" >
                    <div class="input-group-addon">OP-</div>
                    <input type="text" name="op" class="form-control" placeholder="123123"/>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- END BUSQUEDA -->

        @rol('superadmin, admin')
        <div class="col-sm-4">
            <form method="POST" action="">
                @csrf
                <span style="color:#111;opacity:.65;">OP de Stockers</span>
                <div class="input-group" >
                    <div class="input-group-addon">OP-</div>
                    <input type="text" name="rastrearop" class="form-control" placeholder="123123"/>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> Rastrear</button>
                    </span>
                </div>
            </form>
        </div>
        @endrol

        <div class="col-sm-4">
            <form method="POST" action="">
                @csrf
                <span style="color:#111;opacity:.65;">Stocker o Número de serie de placa</span>
                <div class="input-group" >
                    <input type="text" name="element" class="form-control" placeholder="'STK0000' o '9999999999'" />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    </span>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END HEADER -->