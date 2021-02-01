<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/areas/getListarAreas', 'AreasController@index');
Route::post('/areas/crearAreas', 'AreasController@Crear');
Route::get('/areas/getArea/{id}', 'AreasController@getArea');
Route::put('/areas/modificarArea/{id}', 'AreasController@Modificar');

Route::get('/sucursales/getListarSucursales', 'SucursalesController@index');
Route::post('/sucursales/crearSucursal', 'SucursalesController@Crear');
Route::get('/sucursales/getSucursal/{id}', 'SucursalesController@getSucursal');
Route::put('/sucursales/modificarSucursal/{id}', 'SucursalesController@Modificar');

Route::get('/unidades/getListarUnidades', 'UnidadesController@index');
Route::post('/unidades/crearUnidad', 'UnidadesController@Crear');
Route::get('/unidades/getUnidad/{id}', 'UnidadesController@getUnidad');
Route::put('/unidades/modificarUnidad/{id}', 'UnidadesController@Modificar');

Route::get('/herramientas/getListarHerramientas', 'HerramientasController@index');
Route::post('/herramientas/crearHerramientas', 'HerramientasController@Crear');
Route::get('/herramientas/getHerramienta/{id}', 'HerramientasController@getHerramienta');
Route::put('/herramientas/modificarHerramienta/{id}', 'HerramientasController@Modificar');

Route::get('/epps/getListarEpps', 'EppsController@index');
Route::post('/epps/crearEpps', 'EppsController@Crear');
Route::get('/epps/getEpp/{id}', 'EppsController@getEpp');
Route::put('/epps/modificarEpp/{id}', 'EppsController@Modificar');

Route::get('/cursos/getListarCursos', 'CursosController@index');
Route::post('/cursos/crearCursos', 'CursosController@Crear');
Route::get('/cursos/getCurso/{id}', 'CursosController@getCurso');
Route::put('/cursos/modificarCurso/{id}', 'CursosController@Modificar');

Route::get('/{optional?}', function () {
    return view('layouts/app');
})->name('basepath')
  ->where('optional', '.*');

Auth::routes();