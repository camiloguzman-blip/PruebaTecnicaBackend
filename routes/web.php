<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\HomeController;


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
    return view('auth.login');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/Empleados', function () {
    return view('Empleados.index');
});

Route::get('/Empleados', [EmpleadosController::class, 'index'])->name('Empleados');

Route::resource('Empleados',EmpleadosController::class)->middleware('auth');

Route::get('/Cargos', function () {
    return view('Cargos.index');
});

Route::resource('Cargos',CargosController::class)->middleware('auth');

Auth::routes([]);

//Route::group(['middleware' => 'auth'], function(){
//});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/Empleados', [EmpleadosController::class, 'index']);
//Route::get('/welcome', [EmpleadosController::class, 'index'])->name('welcome');
//Route::get('/', [EmpleadosController::class, 'index'])->name('welcome');

//Route::get('/Cargos/create', [CargosController::class, 'create']);
//Route::resource('Cargos',CargosController::class);