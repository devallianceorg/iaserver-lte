<div>
    <a class="btn btn-app" href="{{ route('controldestencil.index') }}">
        <i class="fa fa-barcode"></i> Stenciles
    </a>

    <a class="btn btn-app">
        <i class="fa fa-folder"></i> Ingreso
    </a>

    <a class="btn btn-app">
        <i class="fa fa-folder-o"></i> Salida
    </a>

    <a class="btn btn-app" href="{{ route('controldestencil.lavados') }}">
        <i class="fa fa-tint"></i> Lavados
    </a>

    <a class="btn btn-app" href="{{ route('controldestencil.observaciones') }}">
        <i class="fa fa-envelope"></i> Observaciones
    </a>

    <a class="btn btn-app">
        <i class="fa fa-th"></i> Ubicaciones
    </a>

    @rol('stencil_admin, stencil_operador, superadmin')
        <a class="btn btn-app">
            <i class="fa fa-save"></i> Crear
        </a>

        <a class="btn btn-app">
            <i class="fa fa-repeat"></i> Vaciar Armario
        </a>

        <a class="btn btn-app">
            <i class="fa fa-random"></i> Ingreso continuo
        </a>
    @endrol


</div>
