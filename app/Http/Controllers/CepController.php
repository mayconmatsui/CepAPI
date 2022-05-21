<?php

namespace App\Http\Controllers;

use App\Http\Resources\CepResource;
use Canducci\ZipCode\Facades\ZipCode;
use Illuminate\Support\Str;

class CepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *@var  $ceps
     * @return \Illuminate\Http\Response
     */
    public function ceps($ceps)
    {
        $ceps = explode(',', $ceps);
        $results = [];
        foreach ($ceps as $cep) {
            if ($this->validaCep($cep)) {
                $zipCodeInfo = ZipCode::find($cep, true);
                $results[] = $zipCodeInfo ? $zipCodeInfo->getObject() : '';
            }
        }

        return CepResource::collection(collect($results)->sortByDesc('cep')->values())->all();
    }

    private function validaCep($cep)
    {
        $cep = Str::replace('-', '', $cep);
        return strlen($cep) == 8 ? $cep : false;
    }
}
