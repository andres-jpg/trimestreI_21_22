<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    public function getIndex()
    {
        $municipios = Municipio::all();
        return view('municipios', array(
            'municipios' => $municipios
        ));
    }

    public function getEdit($municipio_id)
    {

    }

    public function putEdit(Request $request, $municipio_id)
    {

    }
}
