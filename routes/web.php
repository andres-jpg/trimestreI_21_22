<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\LocalidadesController;
use App\Http\Controllers\TerremotosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('import', [TerremotosController::class, 'getImport']);

Route::get('municipios', [MunicipiosController::class, 'getIndex'])->name('municipios');
Route::get('municipios/edit/{municipio_id}', [MunicipiosController::class, 'getEdit'])->name('getMunicipio');
Route::put('municipios/edit/{id}', [MunicipiosController::class, 'putEdit'])->name('putMunicipio');

Route::get('localidades/{municipio_id?}', [LocalidadesController::class, 'getIndex'])->name('localidades');

Route::get('terremotos/{localidad_id?}', [TerremotosController::class, 'getIndex'])->name('terremotos');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';
