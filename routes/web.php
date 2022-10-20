<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CidadeController;

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

Route::resource('/especialidade', EspecialidadeController::class);
Route::get('cidade/{estado}/estado', [CidadeController::class, 'getCidades'])->name('cidade.getCidades');
Route::resource('/medico', MedicoController::class);
Route::resource('/paciente', PacienteController::class);
Route::post('medico/especialidade', [MedicoController::class, 'adicionarEspecialidade'])->name('adicionarEspecialidade');
Route::delete('medico/especialidade/{medico_id}/{especialidade_id}', [MedicoController::class, 'deleteEspecialidade'])->name('medico.especialidade.delete');
