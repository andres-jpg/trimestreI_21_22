<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Terremoto;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedMunicipios();
        self::seedLocalidades();
        self::seedTerremotos();
        Schema::disableForeignKeyConstraints();

        Schema::enableForeignKeyConstraints();
    }

    private static function seedMunicipios()
    {
        Municipio::truncate();
        foreach (self::$municipios as $municipio) {
            $m = new Municipio;
            $m->nombre = $municipio['nombre'];
            $m->poblacion = $municipio['poblacion'];
            $m->save();
        }
    }

    private static function seedLocalidades()
    {
        Localidad::truncate();
        foreach (self::$localidades as $localidad) {
            $l = new Localidad;
            $l->nombre = $localidad['nombre'];
            $l->estado = $localidad['estado'];
            $l->poblacion = $localidad['poblacion'];
            $l->municipio_id = $localidad['municipio_id'];
            $m->save();
        }
    }

    private static function seedTerremotos()
    {
        Terremoto::truncate();
        foreach(self::$terremotos as $terremoto) {
            if($terremoto['Magnitud'] >= 4) {
                $t = new Terremoto;
                $t->OBJECTID = $terremoto['OBJECTID'];
                $t->DateTime = new \DateTime($terremoto['DateTime']);
                $t->ErrTime = $terremoto['ErrTime'];
                $t->RMS = $terremoto['RMS'];
                $t->Latitude = $terremoto['Latitude'];
                $t->Longitude = $terremoto['Longitude'];
                $t->Depth = $terremoto['Depth'];
                $t->Magnitud = $terremoto['Magnitud'];
                $t->localidad_id = rand(1, 143);
                $t->save();
            }
        }
    }
}
