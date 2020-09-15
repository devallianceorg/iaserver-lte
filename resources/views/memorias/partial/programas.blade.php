<div class="row">
    <div class="container">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <?php $autoIncrement = 0; ?>
        {{ dd($programa) }}
        @if(isset($programa) && count($programa) > 0)
            @foreach($programa as $programaTitle => $programaValues )
                    <?php $autoIncrement++; ?>
                    <div class="panel panel-primary" style="margin:2px;">

                        <!-- Nombre de programa ej LCD2 -->
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $programaTitle }}</h3>
                        </div>

                        <!-- Contenido de programa -->
                        <div class="panel-body">
                            @if(isset($programaTitle))
                                
                            @endif
                        </div>
                    </div>
            @endforeach
        @endif
    </div>
</div>