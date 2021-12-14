<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidad;

class LocalidadesController extends Controller
{
    public function getIndex($municipio_id = null)
    {
        $localidades = Localidad::where('municipio_id', $municipio_id)->get();

        return view('localidades',
        array(
                'arrayLocalidades' => $localidades
            )
        );
    }
}
