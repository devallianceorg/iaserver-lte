<?php
namespace App\Http\Controllers\OrdenDeTrabajo\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiConsume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class TrazabilidadView extends Controller
{

    /**
     * Busca una OP
     *
     * @param $op
     * @return \Illuminate\View\View
     */
    public function findOp(Request $request, $op="")
    {
      $op = strtoupper( $op );
      if(empty($op))
      {
			  $op = strtoupper( $request->input('op') );
      }

      // Si escriben mal la OP, se completa el formato
      if(!Str::startsWith($op,'OP-'))
      {
        $op = 'OP-'.$op;
      }
      
      $uri = 'iaserver-api';
      $api = new ApiConsume($uri);
      $api->get("trazabilidad/v1/find/{$op}");

      if($api->hasError()) { return $this->error = $api->getError(); }
      $response = $api->response();
      $op = collect($response);

      return view('trazabilidad.index',$op);
    }

    

    
}