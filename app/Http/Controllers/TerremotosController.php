<?php

namespace App\Http\Controllers;

use App\Models\Terremoto;
use App\Models\Localidad;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TerremotosController extends Controller
{
    public function getIndex($localidad_id = null)
    {
        if(isset($localidad_id)) {
            $terremotos = Terremoto::where('localidad_id', $localidad_id)->get();
            foreach($terremotos as $terremoto) {
                /* Podríamos extraer la dirección en la que se ha producido el terremoto con esta API */
                $response = Http::get("https://nominatim.openstreetmap.org/reverse?format=json&lat=" . $terremoto->Latitude . "&lon=" . $terremoto->Longitude . "&zoom=18&addressdetails=2");
                $response = json_decode($response, true);
                if(array_key_exists('address', $response)) {
                    $address = $response['address'];
                    $village = $address['village'] ?? '';
                    $town = $address['town'] ?? '';
                    $terremoto->localidad_id = $town;
                }
            }
        } else {
            $terremotos = Terremoto::all();
        }
        return view('terremotos', array(
            'terremotos' => $terremotos
        ));
    }

    public function getImport()
    {
        // $numMunicipios = Localidad::count();
        $terremotos = Terremoto::all();
        foreach($terremotos as $terremoto) {
            /* Podríamos extraer la dirección en la que se ha producido el terremoto con esta API */
            $response = Http::get("https://nominatim.openstreetmap.org/reverse?format=json&lat=" . $terremoto->Latitude . "&lon=" . $terremoto->Longitude . "&zoom=18&addressdetails=2");
            $response = json_decode($response, true);
            if(array_key_exists('address', $response)) {
                $address = $response['address'];
                $village = $address['village'] ?? '';
                $town = $address['town'] ?? '';
                if($localidad = Localidad::where('nombre',$village)->orWhere('nombre', $town)->first()) {
                    $terremoto->localidad_id = $localidad->id;
                    $terremoto->save();
                }
            } else {
                $terremoto->delete();
            }
            /*
            $terremoto->localidad_id = rand(1, $numMunicipios);
            $terremoto->save();
            */
        }
        return redirect("/");
    }
}
