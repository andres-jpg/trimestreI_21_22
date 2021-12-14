<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        $this->call(MunicipiosTableSeeder::class);

        $this->call(LocalidadesTableSeeder::class);

        $this->call(TerremotosTableSeeder::class);

        User::create([
            'name' => 'albsierra',
            'email' => 'alberto.sierra@murciaeduca.es',
            'password' => bcrypt('alumno'),
        ]);

        Model::reguard();

        Schema::enableForeignKeyConstraints();
    }
}
