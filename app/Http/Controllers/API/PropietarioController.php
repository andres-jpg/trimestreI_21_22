<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropietarioResource;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PropietarioResource::collection(Propietario::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Propietario::max('id')
        $max = DB::table('propietarios')->max('id') + 1;

        $response = Http::get('https://my.api.mockaroo.com/owners/' . $max . '.json?key=65658a10');

        $propietarioResponse = json_decode($request->getContent(), true);

        $propietario = array(
            'dni' => $propietarioResponse['dni'],
            'nombre' => $propietarioResponse['first_name'],
            'apellidos' => $propietarioResponse['last_name'],
        );

        $propietario = Propietario::create($propietario);

        return new PropietarioResource($propietario);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        return new PropietarioResource($propietario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propietario $propietario)
    {
        $this->authorize('update', $propietario);

        $propietarioData = json_decode($request->getContent(), true);

        $propietario->update($propietarioData);

        return new PropietarioResource($propietario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propietario $propietario)
    {
        $propietario->delete();
    }
}
