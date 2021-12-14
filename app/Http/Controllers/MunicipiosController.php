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
        return view('editMunicipio',
        array(
            'municipio' => Municipio::find($municipio_id)
            )
        );
    }

    public function putEdit(Request $request, $municipio_id)
    {
        $municipio = Municipio::find($municipio_id);
        $municipio->nombre = $request->input('nombre');
        $municipio->poblacion = $request->input('poblacion');
        $municipio->save();
        return redirect('/municipios');
    }
}
