<?php

namespace App\Http\Controllers\Memorias\View\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiLogin;
use App\Http\Controllers\Memorias\Api\v1\MemoriasFind;
use App\Http\Controllers\Memorias\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MemoriasView extends Home
{
    public function search(Request $request, $op="")
    {
        if(empty($op))
        {
            $op = $request->input('search');
        }
        return $this->printCartelera($op);
    }

    public function printCartelera($filtrar='')
    {
        $mode = null;

        // if(Plan::isUpdating())
        // {
            return view('errors.default',
            [
                'titulo'=>'ATENCION',
                'mensaje'=>'El sistema esta actualizando el plan de produccion, ingrese mas tarde...',
                'reload' => 2
            ]);

        // }

        if(Str::startsWith(strtoupper($filtrar),'OP-'))
        {
            $mode = 'op';
        }

        switch($mode)
        {
            case 'op':
                $plan = MemoriasFind::findMemoryByOp($filtrar);

                if(isset($plan->modelo))
                {
                    $programa = $this->cartelera($plan->modelo,$plan->lote,$filtrar);
                }
                break;
            default:
                $programa = $this->cartelera($filtrar);
                break;
        }

        return view('memorias.index',['programa'=>$programa]);
    }

}
