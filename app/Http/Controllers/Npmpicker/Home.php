<?php

namespace App\Http\Controllers\Npmpicker;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Npmpicker\Api\v1\Npmpicker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class Home extends Controller
{
    public function index()
    {
        $fecha = Carbon::now()->toDateString();
        $estado = 'inestable';
        $turno = 'M';
        $linea = 1;

        if(request('linea')) {
            $linea = request('linea');
        }

        if(request('fecha')) {
            $fecha = request('fecha');
        }

        $error = null;
        $lineas = null;
        $feeders = null;

        $api = new Npmpicker();
        $getPing = $api->GetPing($fecha);
        $getFeeders = $api->GetFeeders($fecha,$linea,$turno,$estado);

        // En caso de error al consumir el API,.. se detiene el render
        if($api->fails()) {
            $error = $api->errors();
            return view('npmpicker.index',compact('error'));
        }

        // Preparamos render
        try {
            $lineas = $getPing->response('linea');
            $feeders = $getFeeders->response('feeders');

            ksort($lineas);
        } catch (\Exception $ex) {
            $error = [
                'RenderException' => $ex->getMessage()
            ];
        }

        $render = compact('error','lineas','feeders','linea','fecha','turno');
        return view('npmpicker.index',$render);
    }
}
