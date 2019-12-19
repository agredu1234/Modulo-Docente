<?php

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

use app\Docente;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/docentes', 'DocenteController@index');
Route::get('/reporte', 'DocenteController@reporte');
Route::get('/student', 'DocenteController@student');
Route::post('/attendance/save', 'DocenteController@storeAttendance');

Route::post('/guardar', function (Request $request) {
    $newElement = new Docente() ;
    $newElement ->description= $request ->input('description');
    $newElement ->price = $request -> input('price');
    $newElement -> save();
    return redirect() ->route('guardar.index')->with('info','producto creado exitosamente');
})->name('guardar.lista');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
