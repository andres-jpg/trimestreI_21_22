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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';
